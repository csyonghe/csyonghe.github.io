<?php include("../../common_header.php");?>
<title>A System for Rapid, Automatic Shader Level-of-Detail</title>
<?php include('../../body_head.php'); ?>
<script language="javascript">
 $("nav a[href='/projects.php']").addClass("current");
</script>
<!-- Content Start -->
<div id="guts">

<div class="mainDiv">
	 <center>
                    <p class="subtitle" style="text-align: center; font-size: 24px">A System for Rapid, Automatic Shader Level-of-Detail</p>
                    <p style="font-weight: bold; font-size: 22px; text-align: center">
                        <a href='http://www.csyong.net/'>Yong He</a>, 
                        Tim Foley, Natalya Tatarchuk, 
                        <a href='http://www.cs.cmu.edu/~kayvonf/'>Kayvon Fatahalian</a>
                    </p>
                    <br />
                    <img src="repimg.jpg" alt="Representative Image" /><br />
                </center>
	<p class="subtitle2">Abstract</p>
	<p>
		 Level-of-detail (LOD) rendering is a key optimization used by modern
video game engines to achieve high-quality rendering with fast
performance. These LOD systems require simplified shaders, but
generating simplified shaders remains largely a manual optimization
task for game developers. Prior efforts to automate this process
have taken hours to generate simplified shader candidates, making
them impractical for use in modern shader authoring workflows for
complex scenes. We present an end-to-end system for automatically
generating a LOD policy for an input shader. The system operates
on shaders used in both forward and deferred rendering pipelines,
requires no additional semantic information beyond input shader
source code, and in only seconds to minutes generates LOD policies
(consisting of simplified shader, the desired LOD distance set,
and transition generation) with performance and quality characteristics
comparable to custom hand-authored solutions. Our design
contributes new shader simplification transforms such as approximate
common subexpression elimination and movement of GPU
logic to parameter bind-time processing on the CPU, and it uses
a greedy search algorithm that employs extensive caching and upfront
collection of input shader statistics to rapidly identify simplified
shaders with desirable performance-quality trade-offs.
	</p>
	<p class="subtitle2">Video</p>
	<center>
		<iframe width="940" height="528" src="https://www.youtube.com/embed/QldkZ92R9Wc" frameborder="0" allowfullscreen></iframe>
	</center>
	<p class="subtitle2">Links</p>
	<table class ="mainTable">
	<tr>
	<td width="150px">
	<p>
	<a href="lodgen.pdf"><img src="paperThumb.jpg" alt="Paper Download" /></a><br/>
	<a href="lodgen.pdf">Paper (PDF)</a>
	</p>
	</td>
	<td>
	<p>
	<!--<a href="multirate_sig.pptx"><img src="slidesThumb.jpg" alt="Slides Download" /></a><br/>-->
	<!--<a href="multirate_sig.pptx">Slides (pptx)</a>-->
	</p>
	</td>
	</tr>
	</table>
	
	
</div>
<!-- Content End -->
</div>
