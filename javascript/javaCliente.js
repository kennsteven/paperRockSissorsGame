	var matriz;
	var xy;
	var xyTemp;
	var xyLetras;
	var tamCadena;
	var palabraEncontrada = false;
	
	//Pasa a una matriz el string de la sopa de letras
	function pasarAmatriz(cadenaSopa, filas, columnas){
		var matriz=new Array(filas);
		for (i = 0; i < filas; i++){
			matriz[i]=new Array(columnas);
		}
		
		for(i = 0; i < filas; i++){
			for(j = 0; j < columnas; j++){
				matriz[i][j] = cadenaSopa.charAt(((i*columnas) + j));
			}
		}
		
		return matriz;
	}
	
	function crearArreglo(palabra){
		var tamCadena = palabra.length;
		var arreglo=new Array(2);
		
		for (i = 0; i < 2; i++){
			arreglo[i]=new Array(tamCadena);
		}
		
		return arreglo;
	}
      
	//Se busca una palabra en la matriz de la sopa
    function encontrarPalabra(palabra, cadenaSopa, filas, columnas){
        tamCadena = palabra.length;
		console.log(palabra.length);
        
		var continuarCiclo = true;
        var seguirArriba = true;
        var seguirAbajo = true;
        var seguirDerecha = true;
        var seguirIzq = true;
        var seguirDiagonalAbajo = true;
        var seguirDiagonalArriba = true;
		
        var variable = 0;
		
		matriz = pasarAmatriz(cadenaSopa, filas, columnas);
		xy = crearArreglo(palabra);
		xyTemp = crearArreglo(palabra);
		xyLetras = new Array(4);
		
        console.log("La palabra es " + palabra);
        
        for(var i = 0; i < matriz.length && continuarCiclo; i++){
            for(var j = 0; j < matriz[0].length && continuarCiclo; j++){
                console.log("La matriz i: " + i + " la j: " + j + " la letra: " + matriz[i][j]);
                
               if(matriz[i][j] == palabra.charAt(0)){
                   console.log("La palabra es " + palabra.charAt(0));
                   //Busca hacia abajo si la primera letra de la palabra coincide con la celda actual
				   if(seguirAbajo){
                       console.log("seguir ABAJO " + matriz[i][j] + "\n");
                     
                       for(var k = 0; k < tamCadena; k++){
						   if(i+k < matriz.length){
							   console.log("seguir de la matriz " + matriz[i+k][j]);
							   console.log("seguir de la palabra " + palabra.charAt(k));
							   if(matriz[i+k][j] == palabra.charAt(k)){
								 xyTemp[0][k] = i+k;
								 xyTemp[1][k] = j;
								 xyLetras[k] = matriz[i+k][j];
								 variable++;
								 
							   }else{
									//Ya no coincide
								   seguirAbajo = false;
								   break;
							   }
						   }else{
								break;
						   }
						   
                       }
                   }
                   
				   //Setea las varaiables
                   if(variable == tamCadena){
                       xy = xyTemp;
                       continuarCiclo = false;
                   }else{
                       variable = 0;
                       seguirAbajo = true;
                   }
                   
				   //Busca hacia la derecha si la primera letra de la palabra coincide con la celda actual
                    if(seguirDerecha && continuarCiclo){
                        console.log("seguir DERECHA " + matriz[i][j] + "\n");
                        for(var k = 0; k < tamCadena; k++){
							if(j+k < matriz[0].length){
								console.log("seguir de la matriz " + matriz[i][j+k]);
								console.log("seguir de la palabra " + palabra.charAt(k));
								if(matriz[i][j+k] == palabra.charAt(k)){
									xyTemp[0][k] = i;
									xyTemp[1][k] = j+k;
									console.log("La vara es " + palabra.charAt(tamCadena-k-1) + " res"+ (tamCadena-k-1));
									xyLetras[k] = palabra.charAt(tamCadena-k-1);
									variable++;
								}else{
									//Ya no coincide
									seguirDerecha = false;
									break;
								}
							}else{
								break;
							}	
                        }
                    }
                    
                   if(variable == tamCadena){
                       xy = xyTemp;
                       continuarCiclo = false;
                   }else{
                        variable = 0;
                        seguirDerecha = true;
                   }
				   
                   //Busca hacia arriba si la primera letra de la palabra coincide con la celda actual
                   if(seguirArriba && continuarCiclo){
                        console.log("seguir ARRIBA " + matriz[i][j]+ "\n");
                        for(var k = 0; k < tamCadena; k++){
							if(i-k >= 0){
								console.log("seguir de la matriz " + matriz[i][j+k]);
								console.log("seguir de la palabra " + palabra.charAt(k));
								if(matriz[i-k][j] == palabra.charAt(k)){
									xyTemp[0][k] = i-k;
									xyTemp[1][k] = j;
									xyLetras[k] = matriz[i-k][j];
									variable++;
								}else{
									//Ya no coincide
									seguirArriba = false;
									break;
								}
							}else{
								break;
							}
                        }
                    }
                    
                   if(variable == tamCadena){
                       xy = xyTemp;
                       continuarCiclo = false;
                   }else{
                        variable = 0;
                        seguirArriba = true;
                   }
                   
                   //Busca hacia la izquierda si la primera letra de la palabra coincide con la celda actual
                   if(seguirIzq && continuarCiclo){
                        console.log("seguir IZQ " + matriz[i][j] + "\n");
                        for(var k = 0; k < tamCadena; k++){
							if(j-k >= 0){
								console.log("seguir de la matriz " + matriz[i][j-k]);
								console.log("seguir de la palabra " + palabra.charAt(k));
								if(matriz[i][j-k] == palabra.charAt(k)){
									xyTemp[0][k] = i;
									xyTemp[1][k] = j-k;
									xyLetras[k] = matriz[i][j-k];
									variable++;
								}else{
									//Ya no coincide
									seguirIzq = false;
									break;
								}
							}else{
								break;
							}
                        }
                    }
                    
                   if(variable == tamCadena){
                       xy = xyTemp;
                       continuarCiclo = false;
                   }else{
                        variable = 0;
                        seguirIzq = true;
                   }
				   
				   //Busca en dirección diagona arriba si la primera letra de la palabra coincide con la celda actual
				   if(seguirDiagonalArriba && continuarCiclo){
                        console.log("seguir diagonal Arriba " + matriz[i][j] + "\n");
                        for(var k = 0; k < tamCadena; k++){
                            if(i-k >= 0 && j-k >= 0){
                                console.log("seguir de la matriz " + matriz[i-k][j-k]);
                                console.log("seguir de la palabra " + palabra.charAt(k));
                                if(matriz[i-k][j-k] == palabra.charAt(k)){
                                    xyTemp[0][k] = i-k;
                                    xyTemp[1][k] = j-k;
                                    xyLetras[k] = matriz[i-k][j-k];
                                    variable++;
                                }else{
									//Ya no coincide
                                    seguirDiagonalArriba = false;
                                    break;
                                }
                            }else{
                                break;
                            }
                        }
                    }
                    
                   if(variable == tamCadena){
                       xy = xyTemp;
                       continuarCiclo = false;
                   }else{
                        variable = 0;
                        seguirDiagonalArriba = true;
                   }
                   
                   
				   //Busca en digona abajo si la primera letra de la palabra coincide con la celda actual
                   if(seguirDiagonalAbajo && continuarCiclo){
                        console.log("seguir diagonal Abajp " + matriz[i][j] + "\n");
                        for(var k = 0; k < tamCadena; k++){
                            if(i+k < matriz.length && j+k < matriz[0].length){
                                console.log("seguir de la matriz " + matriz[i+k][j+k]);
                                console.log("seguir de la palabra " + palabra.charAt(k));
                                if(matriz[i+k][j+k] == palabra.charAt(k)){
                                    xyTemp[0][k] = i+k;
                                    xyTemp[1][k] = j+k;
                                    xyLetras[k] = matriz[i+k][j+k];
                                    variable++;
                                }else{
									//Ya no coincide
                                    seguirDiagonalAbajo = false;
                                    break;
                                }
                            }else{
                                break;
                            }
                        }
                    }
                    
                   if(variable == tamCadena){
                       xy = xyTemp;
                       continuarCiclo = false;
                   }else{
                        variable = 0;
                        seguirDiagonalAbajo = true;
                   }
                   
                   
               }
            }
        }
		
		if(continuarCiclo == false){
			palabraEncontrada = true;
		}
		
		return xy;
    }
    
	//Para pruebas iimprime una matriz
    function imprimirRespuesta(parametro){
        for(var i= 0; i < parametro.length; i++){
            console.log(parametro[i].toString());
        }
    }
	
	function resolverPalabra(filas, columnas, palabra, cadenaSopa){
		/*var filas= 4;
		var columnas = 8;
		var palabra = "casa";
		var cadenaSopa = "asacasa8hkasa4x8holafdaa4dsasdad";*/
		
		var resp = encontrarPalabra(palabra, cadenaSopa, filas, columnas);
		imprimirRespuesta(resp);
		console.log(xyLetras.toString());
		
	}

	//Habilita el boton en caso de que se haya encontrado una palabra
	function habilitarBoton(){
		oFormObject = document.forms['formPalabraEncontrada'];
		var botonEnviar = document.getElementById('botonPalabraEncontrada');
		if (palabraEncontrada == false) {
			botonEnviar.disabled = true;
		}else{
			oFormObject.elements["xyLetras"].value = xyLetras;
			oFormObject.elements["xy"].value = xy;
			oFormObject.elements["tamC"].value = tamCadena;
			botonEnviar.disabled = false;
		}
	}