/*LOGIN*/
let GET_CAMBIO = './GetCambio';
let GET_ISLOGIN = './IsLoged';
let GET_DATOS_CAMBIO = './GetDatosCambiar';
let GET_DATOS_TRANSFERENCIA = './GetDatosTransferencia';
let CANCEL_OPERACION = './CancelarOperacion';
let SAVE_CODIGO_VERIFICACION = './SaveCodigoVerificacion';
let SAVE_TRANSFERENCIA_STEP_1 = './SaveTransferenciaStep1';
/*HHTP_REQUEST*/
let ServiceGet = (url,data,callback) =>{
	axios.get(url,{ params: data })
	.then(function (response) {
		if(typeof callback === 'function') {
			callback(response.data)
		}else{
			console.log(response)
		}
	})
	.catch(function (error) {
		console.log(error);
	});
}
let ServicePost = (url,data,callback) =>{
	axios.post(url,data)
	.then(function (response) {
		if(typeof callback === 'function') {
			callback(response.data)
		}else{
			console.log(response)
		}
	})
	.catch(function (error) {
		console.log(error);
	});
}
export {
	ServiceGet,
	ServicePost,
	GET_CAMBIO,
	GET_ISLOGIN,
	GET_DATOS_CAMBIO,
	GET_DATOS_TRANSFERENCIA,
	SAVE_TRANSFERENCIA_STEP_1,
	CANCEL_OPERACION,
	SAVE_CODIGO_VERIFICACION
}