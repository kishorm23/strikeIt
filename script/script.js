	function load()
	{
	document.getElementById('list').innerHTML="";
	var number=0;
	xmlhttp=new XMLHttpRequest;
	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState==4&&xmlhttp.status==200){
	file=xmlhttp.responseText;
	console.log(file);
	tdone=0;
	ndone=0;
	for(i=0;file.charAt(i)!='%';i++)
	{
	if(file.charAt(i-1)=='\n'||i==0)
	{
	for(j=i;file.charAt(j)!='\n';j++) {if(file.charAt(j)=='#') pos=j;}
	id=file.substring(i,pos);
	value=file.substring(pos+1,j-2);
	done=file.substring(j-1,j);
	if(done==1) 
	{
	value=value.strike();
	tdone=tdone+1;
	}
	else ndone++;
	console.log(tdone+" 000 "+ndone);
	document.getElementById('list').innerHTML+='<div id="'+id+'"><li><div class="todo"><div id="text'+id+'"><label id="textbox'+id+'" >'+value+'</label></div><input type="button" name="'+id+'" id="done'+id+'" value="done" onclick="donetask(this.name)" class="donebutton"><input type="button" id="button'+id+'" name="'+id+'" value="edit" onclick="edit(this.name)" class="addbutton"><input type="button" name="'+id+'" value="delete" onclick="deleteit(this.name)" class="deletebutton"></div></li><div>';
	if(done==1) document.getElementById("done"+id).disabled=true;
	document.getElementById('text'+id).style.display="inline-block";
	window.myvalue=id;
	console.log(window.myvalue);
	}
	}
	document.getElementById("done").innerHTML="<b>"+tdone+"</b> Tasks done";
	document.getElementById("ndone").innerHTML="<b>"+ndone+"</b> remaining";
	}
	}
	url="manage.php?task=retrieve";
	xmlhttp.open('GET',url,false);
	xmlhttp.send();
	}

	function blank(a) {if(a.defaultValue=="Click to add new task"&&a.value == a.defaultValue) a.value = "";a.type="text"; }

	function unblank(a) { if(a.value == "") a.value = a.defaultValue; }


	function add(y){
	if(document.getElementById("button"+y).value=="edit") edit(y);
	else
	{
	var x=document.getElementById("textbox"+y);
	console.log(x.value);
	if(x.value=="Click to add new task") alert("Cannot add blank task");
	else{
	xmlhttp=new XMLHttpRequest;
	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState==4&&xmlhttp.status==200){
	document.getElementById("text"+y).innerHTML="<label id='textbox"+y+"'>"+x.value+"</label><input type='button' name="+window.myvalue+" id='done"+window.myvalue+"' value='done' onclick='donetask(this.name)' class='donebutton'>";
	var z=document.getElementById("button"+y);
	z.onclick=function onclick(event){edit(this.name)};
	z.value="edit";
	}
	} 
	url="manage.php?task=add&id="+y+"&value="+x.value;
	xmlhttp.open('GET',url,true);
	xmlhttp.send();
	}
	}
	load();
	}


	function edit(t){
	if(document.getElementById("button"+t).value=="add") add(t);
	else
	{
	var x=document.getElementById('textbox'+t).innerHTML;
	console.log(x);
	document.getElementById("text"+t).innerHTML="<input type='text' id='textbox"+t+"' value='"+x+"' onfocus='blank(this)' onblur='unblank(this)' class='textbox'>";
	var z=document.getElementById("button"+t);
	z.onclick=function onclick(event){add(this.name)};
	z.value="add";
	}
	}

	window.myvalue;

	function additem()
	{
	if(isNaN(window.myvalue)) window.myvalue=0;
	window.myvalue++;
	console.log(window.myvalue);
	document.getElementById('list').innerHTML+='<div id="'+window.myvalue+'"><li><div class="todo"><div id="text'+window.myvalue+'"><input type="text" id="textbox'+window.myvalue+'" value="Click to add new task" onfocus="blank(this)" onblur="unblank(this)" class="textbox"></div><input type="button" id="button'+window.myvalue+'" name="'+window.myvalue+'" value="add" onclick="add(this.name)" class="addbutton"><input type="button" name="'+window.myvalue+'" value="delete" onclick="deleteit(this.name)" class="deletebutton"></div></li><div>';
	document.getElementById('text'+window.myvalue).style.display="inline-block";
	}

	function deleteit(m)
	{
	xmlhttp=new XMLHttpRequest;
	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState==4&&xmlhttp.status==200){
	document.getElementById(m).innerHTML='';
	document.getElementById(m).id='null';
	}
	}
	url="manage.php?task=delete&id="+m;
	xmlhttp.open('GET',url,true);
	xmlhttp.send();
	load();
	}

	function donetask(name)
	{
	xmlhttp=new XMLHttpRequest;
	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState==4&&xmlhttp.status==200){
	document.getElementById("textbox"+name).innerHTML=document.getElementById("textbox"+name).innerHTML.strike();
	document.getElementById("done"+name).disabled=true;
	}
	}
	url="manage.php?task=done&id="+name;
	xmlhttp.open('GET',url,true);
	xmlhttp.send();
	load();
	}