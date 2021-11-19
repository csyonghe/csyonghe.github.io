<?php include("../common_header.php");?>
<title>Yong He - Projects</title>
<?php include('../body_head.php'); ?>
<!-- Content Start -->
<div id="guts">
<p class = "subtitle">Project - MetaCompiler</p>
<p>This is a C++ library for creating front-ends of compilers. The project is similar to yacc, except for it's a run-time library rather than a static code generator. 
Meta Compiler is made up of MetaLexer, which is responsible for lexical analysis, 
and MetaParser, which is an LR(1) parser. MetaLexer takes a configuration string including the regular expression 
for each type of tokens as input, and outputs a token stream. MetaParser takes the token stream along with a configuration 
string indicating the BNF grammar rules as input, and helps generating the syntax tree by building an LR(1) parse table. 
Since the configuration strings for MetaLexer and MetaParser can be specified at runtime, MetaCompiler would be capable 
dealing with wider range of languages.</p>
<p>I also implemented a wrapper for <a href = "gxscript.php">GxScript</a>(a scripting language designed myself), which makes writing parsers suprisingly easy.
Below is an expression evaluator written in GxScript.</p>
<p class = "subtitle2">Example: constructing an expression evalutator using MetaCompiler in GxScript</p>
<p class = "codeblock">
<font color="#000000">
<font color="#0000FF">var</font>&nbsp;parser&nbsp;=&nbsp;CreateMetaParser();&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
<font color="#0000FF">var</font>&nbsp;lexProfile&nbsp;=&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
<font color="#800000">&quot;#WhiteSpace&nbsp;=&nbsp;{\\s+}\n&quot;</font>&nbsp;&amp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
<font color="#800000">&quot;Number&nbsp;=&nbsp;{\\d+(.\\d*)?}\n&quot;</font>&nbsp;&amp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
<font color="#800000">&quot;OpAddSub&nbsp;=&nbsp;{\\+|-}\n&quot;</font>&nbsp;&amp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
<font color="#800000">&quot;OpMulDiv&nbsp;=&nbsp;{\\*|/}\n&quot;</font>&nbsp;&amp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
<font color="#800000">&quot;LParent&nbsp;=&nbsp;{\\(}\n&quot;</font>&nbsp;&amp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
<font color="#800000">&quot;RParent&nbsp;=&nbsp;{\\)}\n&quot;</font>;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.SetLexer(lexProfile);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.AddRule(<font color="#800000">&quot;#left&nbsp;1&nbsp;OpAddSub&quot;</font>);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.AddRule(<font color="#800000">&quot;#left&nbsp;2&nbsp;OpMulDiv&quot;</font>);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.AddRule(<font color="#800000">&quot;*Exp&nbsp;-&gt;&nbsp;Expr&quot;</font>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">function</font>&nbsp;(n)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;writeln(<font color="#800000">&quot;The&nbsp;result&nbsp;is&nbsp;&quot;</font>&nbsp;&amp;&nbsp;n);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;});&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.AddRule(<font color="#800000">&quot;Expr&nbsp;-&gt;&nbsp;Expr&nbsp;OpAddSub&nbsp;Expr&quot;</font>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">function</font>&nbsp;(n1,&nbsp;op,&nbsp;n2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">if</font>&nbsp;(op&nbsp;==&nbsp;<font color="#800000">&quot;+&quot;</font>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">return</font>&nbsp;n1&nbsp;+&nbsp;n2;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">else</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">return</font>&nbsp;n1&nbsp;-&nbsp;n2;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;});&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.AddRule(<font color="#800000">&quot;Expr&nbsp;-&gt;&nbsp;Expr&nbsp;OpMulDiv&nbsp;Expr&quot;</font>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;f3&nbsp;=&nbsp;<font color="#0000FF">function</font>&nbsp;(n1,&nbsp;op,&nbsp;n2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">if</font>&nbsp;(op&nbsp;==&nbsp;<font color="#800000">&quot;*&quot;</font>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">return</font>&nbsp;n1&nbsp;*&nbsp;n2;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">else</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">return</font>&nbsp;n1&nbsp;/&nbsp;n2;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;});&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.AddRule(<font color="#800000">&quot;Expr&nbsp;-&gt;&nbsp;OpAddSub&nbsp;Expr&nbsp;{priority&nbsp;4&nbsp;#right}&quot;</font>,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">function</font>&nbsp;(op,&nbsp;n1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">if</font>&nbsp;(op&nbsp;==&nbsp;<font color="#800000">&quot;+&quot;</font>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">return</font>&nbsp;n1;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">else</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#0000FF">return</font>&nbsp;-n1;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
&nbsp;&nbsp;&nbsp;&nbsp;});&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.AddRule(<font color="#800000">&quot;Expr&nbsp;-&gt;&nbsp;LParent&nbsp;Expr&nbsp;RParent&quot;</font>,&nbsp;<font color="#0000FF">function</font>&nbsp;(p,&nbsp;n,&nbsp;p){<font color="#0000FF">return</font>&nbsp;n;});&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.AddRule(<font color="#800000">&quot;Expr&nbsp;-&gt;&nbsp;Number&quot;</font>,&nbsp;<font color="#0000FF">function</font>&nbsp;(n){<font color="#0000FF">return</font>&nbsp;n;}&nbsp;);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.Init();&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
write(<font color="#800000">&quot;Parser&nbsp;ready.&nbsp;Input&nbsp;an&nbsp;expression:&nbsp;&quot;</font>);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
<font color="#0000FF">var</font>&nbsp;src&nbsp;=&nbsp;read();&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
parser.Parse(src);&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
</font>
</p>
<p class = "subtitle3">Program Output:</p>
<center>
<img src = "images/metacompilerresult.jpg" alt = "Input:1+2*3, Output: The result is 7"/>
</center>
<p>You can visit <a href = "http://yongsprojects.codeplex.com" target = "yongsprojects">my Codeplex page</a> for the C++ source of this library.</p>
<p>Alternatively, go to <a href = "gxscript.php">GxScript project page</a> to download the Win32 binary package of GxScript, which enables you to test with the script above.</p>
</div>
<!-- Content End -->
<?php include('../body_tail.php'); ?>