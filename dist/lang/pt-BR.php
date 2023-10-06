<?php
//Página de login

    $FraseTelaLogin            = "Realize seu login para utilizar o sistema";
    $PlaceHolderUsuario        = "Usuário";
    $PlaceHolderSenha          = "Senha";
    $EsqueciSenha              = "Esqueci a senha";
    $BotaoLogar                = "Entrar";
    //mensagem de erro Senha Errada
    
    $TituloMsgSenhaIncorreta   = "Atenção!";
    $MsgSenhaIncorreta         = "Esta senha esta incorreta para este usuario.";
    //mensagens de erro Usuário inexistente
    
    $TituloMsgUsuarioIncorreto = "Atenção!";
    $MsgUsuarioIncorreto       = "Este usuário não se encontra cadastrado em nossa base de dados.";
//Final pagina de login

//Página de Cadastro de Igreja Matriz

    $TituloCadMatriz        = "Cadastro De Igreja Matriz";
    $BotaoNocoCad           = "Novo Cadastro";
    $Col1TabelaIgrejaMatriz = "Igreja's";
    $Col2TabelaIgrejaMatriz = "CNPJ";
    $Col3TabelaIgrejaMatriz = "E-Mail";
    $Col4TabelaIgrejaMatriz = "Status";
    $Col5TabelaIgrejaMatriz = "Ações";
    
   //Tela Novo Cadastro
    $TituloNovoCad          = "Novo cadastro de Igreja Matriz";
    $Col1DescIgreja         = "Descrição da Igreja";
    $PlaceHolderCol1NC      = "Descrição";
    $Col2CEP                = "CEP";
    $PlaceHolderCol2NC      = "00000-000";
    $Col3Ender              = "Endereço";
    $PlaceHolderCol3NC      = "Av./Rua";
    $Col4Numero             = "Número:";
    $PlaceHolderCol4NC      = "0000";
    $Col5Complemento        = "Complemento:";
    $PlaceHolderCol5NC      = "Bloco X";
    $Col6Bairro             = "Bairro:";
    $PlaceHolderCol6NC      = "Bairro";
    $Col7Cidade             = "Cidade:";
    $PlaceHolderCol7NC      = "Cidade";
    $Col8Estado             = "Estado:";
    $PlaceHolderCol8NC      = "Estado";
    $Col9Email              = "E-Mail:";
    $PlaceHolderCol9NC      = "exemplo@email.com";
    $Col10CNPJ              = "CNPJ:";
    $PlaceHolderCol10NC     = "XX.XXX.XXX/0001-XX";
    $Col11NomePres          = "Presidente:";
    $PlaceHolderCol11NC     = "Nome do Presidente";

    $BotaoCancelaGravaMatriz = "Cancelar";
    $BotaoGravarMatriz       = "Gravar";

    //editar Cadastro Botões
    $BotaoCancelaEditaMatriz = "Cancelar";
    $BotaoGravarEditaMatriz  = "Gravar Alterações";
    
//Final da Página De Igreja Matriz  

//inicio cadastro de congregacoes

$TituloCadCongregacao = "Cadastro de Congregações";
    
//Tela de Cadastro de Membros:
	
	//Opções Dados Pessoais NM
    $Col1DadosPessoaisMenu   = "Dados Pessoais";
    $Col2ContatoMenu         = "Contato";
    $Col3CongregacaoMenu     = "Congregação";
    $Col4AdicionaisMenu      = "Adicionais";
    $Col5FotoMenu            = "Foto";
    $Col6ObservaçõesMenu     = "Observações";
    
    // Início Dados Pessoais NM
    
    $Col1NomeMembro 		 = "Nome:";
    $PlaceHolderCol1Membro   = "Nome";
    $Col2SexoMembro          = "Gênero:";
    $PlaceHolderCol2Membro   = "M/F";
    $Col3NomePaiMembro       = "Nome do Pai:";
    $PlaceHolderCol3Membro   = "Pai";
    $Col4NomeMaeMembro       = "Nome da Mãe:";
    $PlaceHolderCol4Membro   = "Mãe";
    $Col5DataNascMembro      = "Data de Nascimento:";
    $PlaceHolderCol5Membro   = "dd/mm/aaaa";
    $Col6Naturalidade        = "Naturalidade:";
    $PlaceHolderCol6Membro   = "Naturalidade";
    $COl7IdentidadeMembro	 = "Identidade (RG):";
	$PlaceHolderCol7Membro   = "XX.XXX.XXX";
	$Col8cpfMembro			 = "CPF:";
	$PlaceHolderCol8Membro   = "XXX.XXX.XXX-XX";
	$Col9ConjugeMembro       = "Nome do Cunjuge:";
	$PlaceHolderCol9Membro   = "Conjuge";
	$Col10Nacionalidade      = "Nacionalidade:";
	$PlaceHolderCol10Membro  = "Nacionalidade";
	
	//Fim Dados Pessoais NM
	
	//Inicio Contato	NM
	$Col1EmailCtt         = "E-mail:";
	$PlaceHolderCol1Ctt   = "exemplo@email.com";
	$Col2cepCtt           = "CEP:";
	$PlaceHolderCol2Ctt   = "XXXXX-XXX";
	$Col3EnderecoCtt      = "Endereço:";
	$PlaceHolderCol3Ctt   = "Av/Rua";
	$Col4NCasaCtt         = "Nº Residência:";
	$PlaceHolderCol4Ctt   = "Nº000";
	$Col5BairroCtt        = "Bairro:";
	$PlaceHolderCol5Ctt   = "Bairro";
	$Col6CidadeCtt        = "Cidade:";
	$PlaceHolderCol6Ctt   = "Cidade";
	$Col7UFCtt            = "UF (Residência):";
	$PlaceHolderCol7Ctt   = "UF";
	$Col8TelFixoCtt       = "Telefone Fixo:";
	$PlaceHolderCol8Ctt   = "Tel. Fixo";
	$Col9TelCelCtt        = "Telefone Celular:";
	$PlaceHolderCol9Ctt   = "Tel. Celular";
	$Col10TelRecadosCtt   = "Telefone Recados:";
	$PlaceHolderCol10Ctt  = "Tel. Recados";
	
	//Fim Contato 
	
	//Inicio Congregação NM
	 
	$Col1MatriculaCong       = "Matrícula:";
	$PlaceHolderCol1Cong     = "Matrícula";
	$Col2PertencimentoCong   = "Pertencente à:";
	$PlaceHolderCol2Cong     = "Selecionar Igreja";
	$Col3BatismoCong         = "Bat. Esp. Santo:";
	$PlaceHolderCol3Cong     = "Selecione";
	$Col4FuncaoCong          = "Função:";
	$PlaceHolderCol4Cong     = "Selecione";
	$Col5SituacaoCong        = "Situação:";
	$PlaceHolderCol5_1Cong   = "Ativo";
	$PlaceHolderCol5_2Cong   = "Inativo";
	$Col6MembroDesdeCong     = "Membro Desde:";
	$PlaceHolderCol6Cong     = "dd/mm/aaaa";
	$Col7AtlCataoCong        = "Atualização Cartão:";
	$PlaceHolderCol7Cong     = "dd/mm/aaaa";
	$Col8AtlEmCong           = "Atualizado em:";
	$PlaceHolderCol8Cong     = "dd/mm/aaaa";
	$Col9HorarioAtlCong      = "Horário Da Atualização:";
	$PlaceHolderCol9Cong     = "--:--";
	$Col10SecretarioCong     = "Secretário:";
	$PlaceHolderCol10Cong    = "Secretário";
	
	//Fim Congregacao NM
	
	//Inicio Adcionais NM
	
	$Col1CooperadorAdc       = "Cooperador:";
	$PlaceHolderCol1Adc      = "dd/mm/aaaa";
    $Col2DiáconoAdc          = "Diácono:";
	$PlaceHolderCol1Adc      = "dd/mm/aaaa";
	$Col3PresbiteroAdc       = "Presbítero:";
	$PlaceHolderCol1Adc      = "dd/mm/aaaa";
	$Col4EvangelistaAdc      = "Evangelista:";
	$PlaceHolderCol1Adc      = "dd/mm/aaaa";
	$Col5PastorAdc           = "Pastor:";
	$PlaceHolderCol1Adc      = "dd/mm/aaaa";
	$Col6MissionarioAdc      = "Missionário:";
	$PlaceHolderCol1Adc      = "dd/mm/aaaa";
	$Col7BatismoAdc          = "Batismo:";
	$PlaceHolderCol1Adc      = "dd/mm/aaaa";
	$Col8LocalBatismoAdc     = "Local Do Batismo:";
	$PlaceHolderCol1Adc      = " ";
	$Col9IgrejaProcAdc       = "Igreja Procedente:";
	$PlaceHolderCol1Adc      = " ";
    
    $FotoDoMembroBotao       = "Foto do Membro";
    $TextoObservacao         = "Histórico";

//Final Tela de Cadastro de Membros:
?>