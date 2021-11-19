<?php include("../common_header.php");?>
<title>Yong He - Projects</title>
<?php include('../body_head.php'); ?>
<!-- Content Start -->
<div id="guts">
<p class = "subtitle">Project - RayTrace2</p>
<p>This is my second attempt in writing a ray tracing renderer. It's written in C++ using
Parallel Programming Library offered in Visual Studio 2010. Currently the 
renderer is running on CPU but I'm working on moving critical parts to GPU, 
exploiting heterogeneous computing resource. The infrastructure supports both 
non-physically based and physically based rendering. Implemented features 
include SAH kd-tree accelerated triangle mesh tracing, anisotropic texture 
filtering, standard shaders (reflection/refraction, lambertian lighting, etc.) 
and photon mapping for global illumination (combined with importance tracing and 
pre-computed irradiance). The system is designed to be easily extensible, and 
more shaders and features are pending.</p>
<p>I'm still working on this project in my spare time. For now, I'm refactoring
the system to support breath-first ray tracing, which is GPU friendly. Upcomming 
objectives are caustics photon map, irradiance caching, geometry instancing and
other BRDF shaders.</p>
<p>You may download the source code at <a href = "http://yongsprojects.codeplex.com" target = "yongsprojects">http://yongsprojects.codeplex.com</a></p>
<p>Following are some results with the configuration and render time annotated. </p>
<center>
<img src = "images/rtpro_sponza.jpg" alt = "Sponza"/>
<p class = "imageAnnotation">Sponza. Original image in 1920*1080. 8x MSAA, 32 final gather rays per sample. 
1M stored photons. Rendered in 9 minutes on a Core i7 870.<br/>Scene modeled by Marko Dabrovic.</p>
</center>
<center>
<img src = "images/rtpro_confroom.jpg" alt = "Conference Room"/>
<p class = "imageAnnotation">Conference room. Original image in 1920*1080. 16x MSAA, 64 final gather rays per sample. 
<br/>40 point lights, 1M stored photons. Rendered in 20 minutes on a Core i7 870.</p>
</center>
<center>
<img src = "images/rtpro_sponge.jpg" alt = "Menger Sponge"/>
<p class = "imageAnnotation">4th order Menger Sponge. Original image in 800*600. 8x MSAA, 32 final gather rays per sample. 
<br/>1 directional light, 500K photons. Rendered in 20.2 seconds on a Core i7 870.</p>
</center>
<center>
<img src = "images/rtpro_kddebug.jpg" alt = "Kd tree tracing debugging program"/>
<p class = "imageAnnotation">A tool writen specifically to debug the kd-tree tracing process.
The best way to debug a program is try to visualize the entire process.<br/> This tool highlights the node traversed in each tracing step.
</p>
</center>
</div>
<!-- Content End -->
<?php include('../body_tail.php'); ?>