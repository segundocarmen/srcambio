function colors(filtered){
	filtered.map((item) =>{
		if(document.getElementById(item)){
			document.getElementById(item).style.borderStyle = "solid";
			document.getElementById(item).style.borderColor = "red";
		}
	});
	setTimeout(()=>{
		filtered.map((item) =>{
			if(document.getElementById(item)){
				document.getElementById(item).style.borderStyle = "solid";
				document.getElementById(item).style.borderColor = "#ced4da";
			}
		});
	},3000)
}

let VALIDATE = (elementos = []) =>{
	var empty = 0;
	var emptys = []; 

	elementos.map((item,i) =>{
		var val = document.getElementById(item).value;
		if(val == ''){
			empty ++;
			emptys.push(item)
			return false;
		}
	});

	if(empty > 0){
		alert('Debe completar todos los campos.');
		colors(emptys);
		return false;
	}else{
		return true;
	}
}

let SERIALIZE = (elementos)=>{
	var miObjeto = new Object()
	elementos.map((item,i) =>{
		var val = document.getElementById(item).value;
		miObjeto[item] = val;
	});
	miObjeto._token=document.head.querySelector('meta[name="csrf-token"]');
	return miObjeto;
}


export {
	VALIDATE,
	SERIALIZE
}