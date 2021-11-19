<?php include("../common_header.php");?>
<title>Yong He - Projects</title>
<?php include('../body_head.php'); ?>
<!-- Content Start -->
<div id="guts">
<p class = "subtitle">Project - GxRay</p>
<p>This is my first attempt in writting a ray tracing renderer which implements a complete solution of lighting equations.
 The renderer supports a wide range of geometries (from basic parametric geometries to KD tree accelerated triangle meshes) 
 as well as materials (from basic Phong and Blinn surfaces to subsurface scattering surfaces).  Other features of the renderer 
 include:	Bump maps, Fast Ambient Occlusion, Volumetric Lights and Soft Shadows, Projection Lights, caustics photon maps, 
 Depth of Field, Glossy Speculation, and Volumetric Fog. However, the implementation of most features in this version are naive 
 and suffering from performance problems. I'm written a new ray tracer at the moment. <a href = "raytracepro.php">Click here for more.</a></p>
<p class = "subtitle2">Images Rendered by GxRay</p>
<center>
<img src = "images/gxray_1.png" alt = "GxRay Render result 1"/><br/>
<img src = "images/gxray_2.jpg" alt = "GxRay Render result 2"/><br/>
<img src = "images/gxray_3.jpg" alt = "GxRay Render result 3"/><br/>
<img src = "images/gxray_4.jpg" alt = "GxRay Render result 4"/><br/>
</center>
</div>
 <!-- Content End -->
<?php include('../body_tail.php'); ?>