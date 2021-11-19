<?php include("../common_header.php");?>
<title>Yong He - Projects</title>
<?php include('../body_head.php'); ?>
<script language="javascript">
 $("nav a[href='/projects']").addClass("current");
</script>
<!-- Content Start -->
<div id = "guts">
<p class = "subtitle">Selected Projects</p>
<p>Here is a list of my projects. Some projects are not listed due to certain restrictions. </p>

<p class = "subtitle2">2015</p>
<img src = "/projects/images/shaderCompiler.jpg" alt = "shader compiler" class = "thumbImage"/>
<p class = "subtitle3">LOD Shader Compiler</p>
<p>I am currently working on a shader compiler that automatically simplifies GLSL shader for different LODs. The compiler uses a data-driven approach to analyze and optimize shaders. More details to come.</p>
<p>&nbsp;</p>

<p class = "subtitle2">2014</p>
<a href = "/publications/multirate"><img src = "/projects/images/multirate.png" alt = "Multi-rate Image" class = "thumbImage"/></a>
<p class = "subtitle3">Adaptive, Multi-Rate Shading</p>
<p>Due to complex shaders and high-resolution displays (particularly on mobile graphics platforms), fragment shading often dominates the cost of rendering in games. To improve the efficiency of shading on GPUs, we extend the graphics pipeline to natively support techniques that adaptively sample components of the shading function more sparsely than per-pixel rates. This work is published at SIGGRAPH 2014. <a href = "/publications/multirate">[Project Page]</a></p>
<p>&nbsp;</p>

<p class = "subtitle2">2013</p>
<a href = "http://graphics.cs.cmu.edu/projects/aac/"><img src = "/projects/images/aac.jpg" alt = "AAC Image" class = "thumbImage"/></a>
<p class = "subtitle3">Efficient BVH Construction via Approximate Agglomerative Clustering</p>
<p>We introduce Approximate Agglomerative Clustering (AAC), an
efficient, easily parallelizable algorithm for generating high-quality
bounding volume hierarchies using agglomerative clustering. The
main idea of AAC is to compute an approximation to the true
greedy agglomerative clustering solution by restricting the set of
candidates inspected when identifying neighboring geometry in the
scene. This work is published at HPG 2013. <a href = "http://graphics.cs.cmu.edu/projects/aac/">[Project Page]</a></p>
<p>&nbsp;</p>
<a href = "/projects/images/rasterRenderer_l.png"><img src = "/projects/images/rasterRenderer.png" alt = "RasterRenderer Image" class = "thumbImage"/></a>
<p class = "subtitle3">RasterRenderer</p>
<p>A software implementation of modern graphics pipeline. The codebase include a high performance tiled-based sort-middle renderer, with 
texture and tessellation support. The renderer features MSAA, anisotropic texture filter, alpha blending and coarse-z post-z optimization, etc. The project also contains a shader compiler that compiles SPMD shaders into high performance SIMD C++ code.
This codebase has been used in my adaptive shading project and some shading language projects. </p>
<p>&nbsp;</p>
<p class = "subtitle2">2012</p>
<a href = "http://apps.microsoft.com/windows/en-us/app/equation-sketchpad/b6402276-06af-4e64-ba3c-25bd39c652e3" target="eqApp"><img src = "/projects/images/equationSketchpad.jpg" alt = "RasterRenderer Image" class = "thumbImage"/></a>
<p class = "subtitle3">Equation Sketchpad</p>
<p>This is a Windows Universal app that plots 2D equations. It supports equations with two free variables (x, y) as well as parametric equations. This is a highly parallelized implementation of <a href ="http://www.dgp.toronto.edu/people/mooncake/papers/SIGGRAPH2001_Tupper.pdf" target="eqpaper">this graph plotting paper</a>. An efficient search algorithm is developed to support tricky parametric equations. Runs on PC, tablets and on Windows Phone 8.1. View store page (<a href = "http://apps.microsoft.com/windows/en-us/app/equation-sketchpad/b6402276-06af-4e64-ba3c-25bd39c652e3" target="eqApp">PC</a>,  <a href="http://www.windowsphone.com/en-us/store/app/equation-sketchpad/91908a76-d6cd-43ac-9e8a-3df37b17cc1a" target="eqApp">Phone</a>) for more information.</p>
<p>&nbsp;</p>
<p class = "subtitle2">2011</p>
<a href = "/projects/raytrace2.php"><img src = "/projects/images/RayTraceProThumb.jpg" alt = "RayTracePro Image" class = "thumbImage"/></a>
<p><a href = "/projects/raytrace2.php" class = "subtitle3">RayTrace2</a> (<a href = "/projects/raytrace2.php">Enter project page</a>)</p>
<p>This is my second attempt in writing a ray tracing renderer. Currently the 
renderer is running on CPU but I'm working on moving critical parts to GPU, 
exploiting heterogeneous computing resource. The infrastructure supports both 
non-physically based and physically based rendering. Implemented features 
include SAH kd-tree accelerated triangle mesh tracing, anisotropic texture 
filtering, standard shaders (reflection/refraction, lambertian lighting, etc.) 
and photon mapping for global illumination (combined with importance tracing and 
pre-computed irradiance). The system is designed to be easily extensible, and 
more shaders and features are pending.</p>
<p class = "subtitle2">2009 - 2010</p>
<a href = "/projects/finalrendering.php"><img src = "/projects/images/FinalRenderingEditor_200.jpg" alt = "FinalRendering WorldEditor Image" class = "thumbImage"/></a>
<p><a href = "/projects/finalrendering.php" class = "subtitle3">Final Rendering</a> (<a href = "/projects/finalrendering.php">Enter project page</a>)</p>
<p>This is a real-time 3D rendering engine, which is based on BSP scene 
management and takes advantages of shader model 4.0. The project consists of the World Editor, the Map Compiler 
and the renderer. In the World Editor, you may create the world geometry based on CSG methods, and set up entities for lighting/rendering or for external purposes.
The map will be processed by the Map Compiler and Illumination Solver, which translates the orignal map to a renderable format. The project put emphasis on robust algorithms involved in
the World Editor and the Map Compiler, as well as better 
visual qualities that can be achieved by the current GPU hardware e.g. reflection/refraction 
surfaces, global specular high-lights, radiosity normal maps, HDR tone mappings, etc. The illumination solver is able to compute high resolution radiosity completely on GPU.</p>
<p><a href = "/projects/metacompiler.php" class = "subtitle3">MetaCompiler</a> (<a href = "/projects/metacompiler.php">Enter project page</a>)</p>
<p>This is a C++ library for creating front-ends of compilers. The project is similar to yacc, except for it's a run-time library rather than a static code generator. 
Meta Compiler is made up of MetaLexer, which is responsible for lexical analysis, 
and MetaParser, which is an LR(1) parser. MetaLexer takes a configuration string including the regular expression 
for each type of tokens as input, and outputs a token stream. MetaParser takes the token stream along with a configuration 
string indicating the BNF grammar rules as input, and helps generating the syntax tree by building an LR(1) parse table. 
Since the configuration strings for MetaLexer and MetaParser can be specified at runtime, MetaCompiler would be capable 
dealing with wider range of languages.</p>
<a href = "/projects/gxray.php"><img src = "/projects/images/GxRayThumb.jpg" alt = "GxRay Image" class = "thumbImage"/></a>
<p><a href = "/projects/gxray.php" class = "subtitle3">GxRay</a> (<a href = "/projects/gxray.php">Enter project page</a>)</p>
<p>This is my first attempt in writting a ray tracing renderer which implements a complete solution of lighting equations.
 The renderer supports a wide range of geometries (from basic parametric geometries to KD tree accelerated triangle meshes) 
 as well as materials (from basic Phong and Blinn surfaces to subsurface scattering surfaces).  Other features of the renderer 
 include:	Bump maps, Fast Ambient Occlusion, Volumetric Lights and Soft Shadows, Projection Lights, caustics photon maps, 
 Depth of Field, Glossy Speculation, and Volumetric Fog. However, the implementation of most features in this version are naive 
 and suffering from performance problems.</p><p>&nbsp;</p>
<p class = "subtitle2">2008</p>
<a href = "/projects/gxscript.php"><img src = "/projects/images/GxScriptThumb.jpg" alt = "GxScript IDE" class = "thumbImage"/></a>
<p><a href = "/projects/gxscript.php" class = "subtitle3">GxScript 3.0</a> (<a href = "/projects/gxscript.php">Enter project page</a>)</p>
<p>This is an object-oriented and dynamic functional scripting language.  Features of GxScript include lambda expressions, 
higher order functions, dynamic classes, reflection, runtime code compilation and garbage collection. A virtual machine is implemented to execute the intermediate instructions 
generated by the compiler. The scripting engine provides interfaces on both native C++ and .net managed environment for 
compiling and hosting scripts.The project also provided a convenient IDE (developed in C#) for coding and debugging. This version is evolved from
two prior experimental versions, each adds new language features. In this project, I learnt a lot in designing a new language and writting a compiler, which 
enables me to design and implement a compiler targeting the GPU in a short time while I was in the lab of Zhejiang University one year later.</p>
<p class = "subtitle2">Undergraduate class projects</p>
<p>The following projects are done for my undergrad course assignments. Most of them are quite simple and were done within a week.</p>
<p class = "subtitle3">Tiny++</p>
<p>Assignment of the Compiler Theory course. It's pascal-like language, featuring functions and arrays. Arrays are passed by reference and are automatically released using reference counting.
The project does not reference any third party libraries, instruction set are defined myself, with a virtual machine that interprets the instructions. Code optimization is not implemented.
An IDE with syntax highlighting is included in this project.</p>
<p class = "subtitle3">Drug Repository Manager</p>
<p>Assignment of the C++ training. It's a web based management system for drug repositories. Functions include goods check-in / check-out and transfer, etc.</p>
<img src = "/projects/images/waveSimulatorThumb.jpg" alt = "Wave Simulator Screenshot" class = "thumbImage" style = "margin-top:0px; margin-bottom:0px"/>
<p class = "subtitle3">Wave Simulator</p>
<p>Assignment of the Data Structures course. The program simulates the ripple of water surface formed from rain drops. The computation of the ripple formed from multiple rain drops 
could be too costly for real-time display, and is therefore moved to GPU. When the a raindrop contacts the water surface, a temprorary wave source is created. The resulting height field of
the water surface is computed on the fly in a GLSL shader. The program archieves real-time performance on a Geforce 8600 graphics card with 1000 wave sources.</p>
<p>&nbsp;</p><p>&nbsp;</p>

<img src = "/projects/images/imageProcessorThumb.jpg" alt = "Image Processor Screenshot" class = "thumbImage" style = "margin-top:0px; margin-bottom:0px"/>
<p class = "subtitle3">Image Processor</p>
<p>Assignment of the Digital Media Processing course. The program implements a variety of image processing algorithms, e.g. Gaussian blur, Sobal filter, 
Laplacian filter, histogram balancing, curve transform, growing region segementation, and threshold segmentation, etc.
For the source code and more information, visit <a href = "http://imageprocess.codeplex.com" target = "imageprocess_codeplex">http://imageprocess.codeplex.com</a></p><p>&nbsp;</p><p>&nbsp;</p>
<p class = "subtitle2">Earlier (while I was in high school)</p>
<img src = "/projects/images/TerrainRendering_Thumb.jpg" alt = "Terrain Rendering" class = "thumbImage" style = "margin-top:0px"/>
<p class = "subtitle3">Terrain Rendering using quad-tree based LOD (2006)</p>
<p>This program is written in my second year in high school. It loads a gray-scale bitmap as the 
height-field and pre-computes the lighting and LOD information. Then it renders the terrain using 
a level of detail reduction algorithm based on quad trees. The renderer textures the terrain in a fragment 
shader by looking up indexing textures. </p> <p>&nbsp;</p><p>&nbsp;</p>
<img src = "/projects/images/pictureManagerThumb.jpg" alt = "Picture Manager Screenshot" class = "thumbImage" style = "margin-top:2px"/>
<p class = "subtitle3">Picture Manager (2005)</p>
<p>This is a picture manager that is similar to ACDSee. Features include file management, image preview (Zoom out/in, rotate, etc.) and simple 
image processing (brightness and contrast adjusting and some other filters). This is written in Delphi. In the early years after I was introduced to programming,
I enjoyed a lot in the fealing of archievement after completing such projects. Though these projects themselves seemed quite simple today, they played a very important role in leading me to more in-depth studying of 
programing and computer science.</p>
</div>
<!-- Content End -->
<?php include('../body_tail.php'); ?>