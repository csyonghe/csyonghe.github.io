<?php include("../common_header.php");?>
<title>Yong He - Projects</title>
<?php include('../body_head.php'); ?>
<!-- Content Start -->
<div id="guts">
<p class = "subtitle">Project - Final Rendering</p>
<p>This is a real-time 3D rendering engine, which is based on BSP scene 
management and takes advantages of shader model 4.0. The project consists of the World Editor, the Map Compiler 
and the renderer. In the World Editor, you may create the world geometry based on CSG methods, and set up entities for lighting/rendering or for external purposes.
The map will be processed by the Map Compiler and Illumination Solver, which translates the orignal map to a renderable format. The project put emphasis on robust algorithms involved in
the World Editor and the Map Compiler, as well as better 
visual qualities that can be achieved by the current GPU hardware e.g. reflection/refraction 
surfaces, global specular high-lights, radiosity normal maps, HDR tone mappings, etc. The illumination solver is able to compute high resolution radiosity completely on GPU.</p>
<p>The engine uses OpenGL 3.0 for real-time rendering. The world editor is written in C++, using a UI library (rendered using OpenGL) written myself. The UI library consists of a wide range 
of controls which is sufficient for most applications.</p>
<p>You can download the source code from <a href = "http://yongsprojects.codeplex.com" target = "yongsprojects">http://yongsprojects.codeplex.com</a></p>
<center>
<img src = "images/FinalRenderingEditor_720.jpg" alt = "World Editor Screenshot"/>
<p class = "imageAnnotation">World Editor. Provides CSG based modeling functions, texture coordinate editing, entity placing and material management.</p>
</center>
<center>
<img src = "images/fr_1.jpg" alt = "Scene Screenshot"/>
<p class = "imageAnnotation">A simple scene being rendered at 220 fps (Geforce 9800GT), demostrating precomputed indirect illumination.</p>
</center>
<center>
<img src = "images/fr_2.jpg" alt = "Scene Screenshot"/>
<p class = "imageAnnotation">Another scene being rendered at 170 fps (Geforce 9800GT), demostrating precomputed indirect illumination.</p>
</center>
<center>
<img src = "images/fr_3.jpg" alt = "Scene Screenshot"/>
<p class = "imageAnnotation">A comparision between radiosity normal map and ordinary texture.</p>
</center>
<center>
<img src = "images/fr_3.jpg" alt = "Scene Screenshot"/>
<p class = "imageAnnotation">A comparision between radiosity normal map and ordinary texture.</p>
</center>
<center>
<img src = "images/fr_4.jpg" alt = "Scene Screenshot"/>
<p class = "imageAnnotation">A comparision between radiosity and direct illumination.</p>
</center>
</div>
<!-- Content End -->
<?php include('../body_tail.php'); ?>