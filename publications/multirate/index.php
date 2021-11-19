<?php include("../../common_header.php");?>
<title>Extending the Graphics Pipeline with Adaptive, Multi-Rate Shading</title>
<?php include('../../body_head.php'); ?>
<script language="javascript">
 $("nav a[href='/projects.php']").addClass("current");
</script>
<!-- Content Start -->
<div id="guts">

<div class="mainDiv">
	<center>
		<p class="subtitle" style="text-align: center; font-size: 24px">Extending the Graphics Pipeline with Adaptive, Multi-Rate Shading</p>
		<p style="font-weight: bold; font-size: 22px; text-align: center">
			<a href='http://www.csyong.net/'>Yong He</a>, 
			<a href='http://www.cs.cmu.edu/~ygu1/'>Yan Gu</a>, 
			<a href='http://www.cs.cmu.edu/~kayvonf/'>Kayvon Fatahalian</a>
		</p>
		<br />
		<img src="repimage.png" alt="Representative Image" /><br />
	</center>
	<p class="subtitle2">Abstract</p>
	<p>
		Due to complex shaders and high-resolution displays (particularly
		on mobile graphics platforms), fragment shading often dominates
		the cost of rendering in games. To improve the efficiency of shading
		on GPUs, we extend the graphics pipeline to natively support
		techniques that adaptively sample components of the shading function
		more sparsely than per-pixel rates. We perform an extensive
		study of the challenges of integrating adaptive, multi-rate shading
		into the graphics pipeline, and evaluate two- and three-rate implementations
		that we believe are practical evolutions of modern GPU
		designs. We design new shading language abstractions that simplify
		development of shaders for this system, and design adaptive
		techniques that use these mechanisms to reduce the number of instructions
		performed during shading by more than a factor of three
		while maintaining high image quality.
	</p>
	<p class="subtitle2">Video</p>
	<center>
		<iframe width="940" height="528" src="//www.youtube.com/embed/LZW8dlip8Ts" frameborder="0" allowfullscreen="allowfullscreen" style="text-align: center"></iframe>
	</center>
	<p class="subtitle2">Links</p>
	<table class ="mainTable">
	<tr>
	<td width="150px">
	<p>
	<a href="multirate.pdf"><img src="paperThumb.jpg" alt="Paper Download" /></a><br/>
	<a href="multirate.pdf">Paper (PDF)</a>
	</p>
	</td>
	<td>
	<p>
	<a href="multirate_sig.pptx"><img src="slidesThumb.jpg" alt="Slides Download" /></a><br/>
	<a href="multirate_sig.pptx">Slides (pptx)</a>
	</p>
	</td>
	</tr>
	</table>
	
	
</div>
<!-- Content End -->
</div>
