CREATE TABLE produtos (
	idProduto     VARCHAR(255) NOT NULL UNIQUE,
    nomeProduto   VARCHAR(100) NOT NULL,
    cameraProduto VARCHAR(100) NOT NULL,
    procesProduto VARCHAR(100) NOT NULL,
    menRamProduto VARCHAR(100) NOT NULL,
    telaDoProduto VARCHAR(100) NOT NULL,
    armazeProduto VARCHAR(100) NOT NULL
);


CREATE TABLE usuarios (
	idUsuario    VARCHAR(255) NOT NULL UNIQUE,
    permissaoAdmin 	BOOLEAN   NOT NULL,
    
    nomeUsuario  VARCHAR(30)  NOT NULL,
    email        VARCHAR(40)  NOT NULL,
    senhaUsuario VARCHAR(255) NOT NULL
);


CREATE TABLE comentariosProduto(
	fkProduto 		  VARCHAR(255) NOT NULL,
    textoComentario	  VARCHAR(255) NOT NULL,
    
    FOREIGN KEY (fkProduto) REFERENCES produtos(idProduto)
);


CREATE TABLE comentariosSite (
	fkUsuario 		  VARCHAR(255) NOT NULL,
    textoComentario	  VARCHAR(255) NOT NULL,
    
    FOREIGN KEY (fkUsuario) REFERENCES usuarios(idUsuario) 
);
