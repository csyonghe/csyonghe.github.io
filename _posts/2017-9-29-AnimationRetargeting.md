---
layout: post
title: Animation Retargeting
---

I am developing a small rendering engine ([SpireMiniEngine](https://github.com/csyonghe/SpireMiniEngine)) to facilitate my shading language research as well as a research project on animations led by another student at our lab. 

## Retargeting Animation to a Different Skeleton

We ran into issues when trying to render a skinned character model (created by someone else) with animation data we captured in our MoCap lab. The major problem is that the skeleton definitions of the models and our animation data do not match up. For example, we got one character model from Adobe Fuse, which is pre-skinned against the standard Mixamo skeleton (which contains 67 bones), some other models also have their own skeletons. Our animation data is against a custom skeleton that has 19 bones.

The mismatch in bone numbers is easy to address - the engine simply asks the user to provide a mapping file stating which bone in the animation file should be used to drive which bone in the model. This often referred to as "rigging" in many engines, basically it is just hooking up channels in an animation (each animation channel stores the transform key frames for a bone) to each bone of the model. 

However, there is another issue. My engine current implements skinning using the following transform sequence:
```
FinalVertexPosition = AnimationTransform * SkeletalInverseBindPose * MeshVertexPosition
```
Where `MeshVertexPosition` is a vertex position of the mesh (in bind pose), `MeshSkeletalInverseBindPose` is the matrix that transforms the vertex position into the bone space, and `AnimationTransform` is the transform provided by the animation data that transforms the bone space into world space, which yields the final world-space position of this vertex. Another way to think of this is, `SkeletalInverseBindPose` translates every part of the body (like the upper arm, fore arm, hand, etc.) back to the origin with the joint of that part sits at origin. Then the `AnimationTransform` first rotates the part to the right orientation, than translate it to the correct world space position. If we do this for every part of the body (controlled by different bones) we will get the character in a different pose.

The problem is how to get the `SkeletalInverseBindPose` matrices for each bone. The model does come with its skeleton and bind-pose transforms for each bone, so I compute `SkeletalInverseBindPose` by inverting the bind-pose transforms that came with the model. But then we must ensure the bone-space defitions of the model's skeleton matches the bone-space definitions of the animation data. 

What I mean by a bone-space coordinate definition, is the orientation of the local coordinate axis of a bone in bind pose. Because these bone axises are rarely drawn out in modeling softwares, people are often unaware of their exact definitions. The following figure shows two different types of bone-space coordinate definitions.

![boneCoordinateDef]({{ site.baseurl }}/images/anim_retarget/fig1.png)

The figure shows a character skeleton in bind pose, illustrating the bone space definition for the left arm (highlighted in red). In (a), the bone space is world-axis-aligned - the axises of the bone's local space are parallel with the world-space axises. In (b), the bone space's x-axis is locally aligned with the arm. Under this definition, we must apply a rotation transform to the arm bone to make the arm in the bind-pose position. 

As a result, if our animation data assumes bone space definitions shown in (a) and our model assumes bone space definitions shown in (b), or in the other way, we will not be getting the correct result. Because even the animation data required to make the character in bind pose would be different - if the model uses definition (a), the bind pose transform for each bone should have no rotation; if the model uses definition (b), the bind pose transform need to specify a rotation to put the arm in the right orientation.

In general, the engine should not need to know the bone space definitions of the model or the animation data at all to work. It should be able to use whatever animation data to drive whatever character model as long as there is a mapping between two skeletons. So what can we do if the model and the animation data assumes different bone space definitions?

Instead of using the model's skeleton and bind pose transforms to derive `SkeletalInverseBindPose`, we could use the animation's skeleton to do that. This will ensure that bone space axis orientations will always match. But the problem of using the animation's skeleton to derive inverse transform is that the animation's skeleton may have a different body shape as the model's skeleton (height and fatness, etc.). Think of the inverse transform as a step to move the all the joints of the body back to the origin - the distances we need to move each joint is dependent on how fat and how tall the model is! So here is the problem: if we use the model's skeleton to derive the inverse transforms, the joints of our model will be translated to the origin after the inverse transform but they will not be in the right orientation as assumed by the animation data; if we use the animation's skeleton to derive the inverse transforms, the joints of our model will be in the right orientation, but not translated to the origin!

So I guess you already have the solution - why not forming a new bind pose that uses the rotations from the animation skeleton's bind pose transforms and translations from the model skeleton's bind pose transforms, and then derive the inverse transform from this new bind pose? And that is exactly what I did. However actually doing it is a little trickier than it sounds, because the translation of a bone's bind pose transform is defined as relative to the parent bone's space (which is defined by the parent bone's bind pose transform from the model's skeleton), and if we are defining the bone space using rotations from the animation's skeleton, the new parent bone's space defintion would be different from the model skeleton's original definition, so the same translation values from model skeleton's bind pose will not work except for the root node! To ensure correctness, these translations values must be mapped to the new bone space definitions as the program computes the new retargeted bind pose. The following pseudo code illustrates how to compute the new bind pose transforms.
```
input:
  /* animation skeleton's bind pose transforms for each bone, relative to its parent bone */
  Matrix4 animBindPose[N]; 

  /* animation skeleton's bind pose transforms for each bone, relative to world space
     i.e. animAccumBindPose[i] = animBindPose[i0] * animBindPose[i1] * ... * animBindPose[i]
     where i0, i1, ... are bone i's parents with i0 being the root and i_n being the 
     immediate parent. 
  */
  Matrix4 animAccumBindPose[N];

  /* model skeleton's bind pose transforms for each bone, relative to its parent bone */
  Matrix4 modelBindPose[N];

  /* model skeleton's bind pose transforms for each bone, relative to world space */
  Matrix4 modelAccumBindPose[N]

  /* a function that extracts the translation transform from a given matrix */
  Matrix4 GetTranslationMatrix(Matrix4 m); 

  /* a function that extracts the rotation transform from a given matrix */
  Matrix4 GetRotationMatrix(Matrix4 m); 

output:
  /* retargeted bind pose transforms for each bone, relative to its parent bone */
  Matrix4 retargetedBindPose[N];

  /* retargeted bind pose transforms for each bone, relative to world space */ 
  Matrix4 retargetedAccumBindPose[N];

algorithm:
  retargetedBindPose[0] = GetTranslationMatrix(modelBindPose[0]) * GetRotationMatrix(animBindPose[0]);
  // assumes bones are topologically sorted in root-to-leaves order
  for i = 0 to N
    int p = ParentBoneOf(i); // bone p is already processed by this loop
    // compute retargeted translation term
    float3 retargetedTranslation = Inverse(retargetedAccumBindPose[p]) 
                                    * modelAccumBindPose[p] * modelBindPose[i].Translation;
    retargetedBindPose[i] = TranslationMatrix(retargetedTranslation) 
                             * GetRotationMatrix(animBindPose[i]);
    retargetedAccumBindPose[i] = retargetedAccumBindPose[p] * retargetedBindPose[i];
```

The inverse of `retargetedAccumBindPose` computed by this algorithm can then be used as `SkeletalInverseBindPose` to render the character. The core logic to compute the right translation terms lies in the line

```
float3 retargetedTranslation = Inverse(retargetedAccumBindPose[p]) 
                                    * modelAccumBindPose[p] * modelBindPose[i].Translation;
```

This is because we want the position of the bone in retargeted bind pose to be the same as in the model skeleton's bind pose.
The position of a bone in model skeleton's bind pose is given by

```
bonePosition = modelAccumBindPose[p] * modelBindPose[i].Translation
```

Because bone `i`'s bind pose translation term is relative to bone `i`'s parent bone, `p`'s space. And we want to achieve:

```
retargetedAccumBindPose[p] * retargetedTranslation == bonePosition
```

Solving this equation leads to the line in the pseudo code.

## Retargeting Different Bind Poses

The only input retargeting task described in previous section is a model skeleton (bone hierarchy and bind pose transforms), an animation skeleton and a mapping of bone names of the two skeletons do not fully match. The rest of the computation is done by the engine. This retargeting step addresses the differences of bone-space definitions and body shapes between animation and model skeletons. However, this computation assumes that the model is already in the same pose as the animation skeleton's bind pose. That said, if the animation's skeleton is in T-pose, the model must also come in T-pose.

Chances are that some character models are created in A pose or some other poses, or the animation skeleton's bind pose is not a standard T pose but some other weird poses. Don't ask me why the animation skeletons from our MoCap lab are using differnet bind poses or even non-standard bind poses. The one who is responsible for cleaning up mocap data is probably too busy to deliver consistent data to our students, so my engine needs to have a workflow to support them all!

So the goal for my engine is to be able to use animation data that is against a skeleton with some arbitrary bind pose to drive arbitrary model character that is in either T pose or A pose. The retargeting computation from previous section assumes the model is already in the same pose as the animation skeleton's bind pose. If they are not, we need another step to deform the input model into the desired bind pose first! Luckily, this is easily achievable by crafting an animation key frame (containing transformations for each bone) that are defined against the model's skeleton to transform the model. I will call it pose retargeting transforms, as denote as `R`. With that, we can use `R * ModelInverseBindPose * MeshVertexPosition` to transform the model into a desired pose, before applying the retargeting procedure in previous section.

## Implementation

With all these ideas sorted out, I implemented a skeleton retargeting tool for my engine, as shown in the figure below.

![retargetTool]({{ site.baseurl }}/images/anim_retarget/fig2.png)

The tool provides interface for the user to set up the bone mapping between the animation skeleton and model skeleton (through the panel on the right). If the bind poses of the two skeletons are different, the tool provides the interface (through the panel on the left) to type in transformations for each bone to morph the character into the same pose as animation skeleton's bind pose. The user can see the changes of the model as he types in the transformation values. The tool then uses the pose retargeting transforms to compute a single set of `SkeletonInverseBindPose` matrices and store them in a `.retarget` file. A good thing is that retargeting is an purely offline process and does not impact render performance. When rendering an animated model, the engine only requires three things: the mesh of the model, the `.retarget` file, and animation data (key frames). Once retargeting is done, there are no more worries about any mismatches in animation data and models through out the rest of the engine.