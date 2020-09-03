
function validar()
{
    let valorNome=document.forms['form-product']['name'].value;
    let valorPreco=document.forms['form-product']['price'].value;
    let valorDescricao=document.forms['form-product']['description'].value;
    let valorcategoria=document.forms['form-product']['category_category'].value;
    let valorImage=document.forms['form-product']['image'].value;

    let msg_erro='';
    let avancar=true;
    
    if(valorNome =='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        if(valorNome.length<=3)
        {
            msg_erro='Nome muito pequeno!';
            modalerro(msg_erro);
            document.getElementById('erro1').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorPreco== '')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro2').innerHTML= msg_erro;
        avancar=false;
    }
    if(valorDescricao== '' )
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro3').innerHTML= msg_erro;
        avancar=false;
    }
    if(valorcategoria== '')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro4').innerHTML= msg_erro;
        avancar=false;
    }
    if( valorImage== '')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro5').innerHTML= msg_erro;
        avancar=false;
    }
    return avancar;
}
function validarEditpro()
{
    let valorNome=document.forms['form-product']['name'].value;
    let valorPreco=document.forms['form-product']['price'].value;
    let valorDescricao=document.forms['form-product']['description'].value;
    let valorcategoria=document.forms['form-product']['category_category'].value;

    let msg_erro='';
    let avancar=true;
    
    if(valorNome =='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        if(valorNome.length<=3)
        {
            msg_erro='Nome muito pequeno!';
            modalerro(msg_erro);
            document.getElementById('erro1').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorPreco== '')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro2').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        if(valorPreco.indexOf(',')!== -1)
        {
            msg_erro='As casas decimais devem ser separadas por ponto!';
            modalerro(msg_erro);
            document.getElementById('erro2').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorDescricao== '' )
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro3').innerHTML= msg_erro;
        avancar=false;
    }
    if(valorcategoria== '')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro4').innerHTML= msg_erro;
        avancar=false;
    }
    return avancar;
}

function validarCategoria()
{
    let valorcategory=document.forms['form-categoria']['category'].value;
    let msg_erro='';
    let avancar=true;
     if(valorcategory=='')
     {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
     }
     else
     {
        if(valorcategory.length<=3)
        {
            msg_erro='Nome muito pequeno!';
            modalerro(msg_erro);
            document.getElementById('erro1').innerHTML= msg_erro;
            avancar=false;
        } 
     }
  return avancar;
}

function validarEstoque()
{
    let valorstory=document.forms['form-estoque']['story'].value;
    
    let msg_erro='';
    let avancar=true;
    
    if(valorstory =='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        if(valorstory.length<=3)
        {
            msg_erro='Nome muito pequeno!';
            modalerro(msg_erro);
            document.getElementById('erro1').innerHTML= msg_erro;
            avancar=false;
        }
    }
    return avancar;
}

function validarUsuario()
{
    let valorNomeuser=document.forms['form-usuario']['name'].value;
    let valorEmail=document.forms['form-usuario']['email'].value;
    let valorSenha=document.forms['form-usuario']['password'].value;
    let valorConfirmSenha=document.forms['form-usuario']['Confirmpassword'].value;
    console.log(valorEmail.indexOf('@'));
    let msg_erro='';
    let avancar=true;

    if(valorNomeuser=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        if(valorNomeuser.length<=3)
        {
            msg_erro='Nome muito pequeno!';
            modalerro(msg_erro);
            document.getElementById('erro1').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorEmail=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro2').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        if(valorEmail.indexOf('@')== -1 ||valorEmail.length<=8)
        {
            msg_erro='Email invalido!';
            modalerro(msg_erro);
            document.getElementById('erro2').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorSenha=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro3').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        if(valorSenha.length<=5)
        {
            msg_erro='Senha muito fraca!';
            modalerro(msg_erro);
            document.getElementById('erro3').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorConfirmSenha=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro4').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        if(valorConfirmSenha.length<=5)
        {
            msg_erro='Senha muito fraca!';
            modalerro(msg_erro);
            document.getElementById('erro4').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorSenha!= valorConfirmSenha)
    {
        msg_erro='As senhas não conferem!';
        modalerro(msg_erro);
        document.getElementById('erro4').innerHTML= msg_erro;
        avancar=false;
    }
    return avancar;
}
function validarUsuarioUpdate()
{
    let valorNomeuser=document.forms['form-usuario']['name'].value;
    let valorEmail=document.forms['form-usuario']['email'].value;
    let valorSenha=document.forms['form-usuario']['password'].value;
    let valorConfirmSenha=document.forms['form-usuario']['Confirmpassword'].value;
    console.log(valorEmail.indexOf('@'));
    let msg_erro='';
    let avancar=true;

    if(valorNomeuser=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        if(valorNomeuser.length<=3)
        {
            msg_erro='Nome muito pequeno!';
            modalerro(msg_erro);
            document.getElementById('erro1').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorEmail=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro2').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        if(valorEmail.indexOf('@')== -1 ||valorEmail.length<=8)
        {
            msg_erro='Email invalido!';
            modalerro(msg_erro);
            document.getElementById('erro2').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorSenha=='')
    {
       
    }
    else
    {
        if(valorSenha.length<=5)
        {
            msg_erro='Senha muito fraca!';
            modalerro(msg_erro);
            document.getElementById('erro3').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorConfirmSenha=='')
    {
      
    }
    else
    {
        if(valorConfirmSenha.length<=5)
        {
            msg_erro='Senha muito fraca!';
            modalerro(msg_erro);
            document.getElementById('erro4').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorSenha!= valorConfirmSenha)
    {
        msg_erro='As senhas não conferem!';
        modalerro(msg_erro);
        document.getElementById('erro4').innerHTML= msg_erro;
        avancar=false;
    }
    return avancar;
}

function validarDeposito()
{
    let valorStory=document.forms['form-deposito']['story_story'].value;
    let valornome=document.forms['form-deposito']['products_name'].value;
    let valorqtd=document.forms['form-deposito']['qtd'].value;
    let valorCategoria=document.forms['form-deposito']['category_category'].value;

    let msg_erro='';
    let avancar=true;

    if(valorStory=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
    }
    if(valornome=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro2').innerHTML= msg_erro;
        avancar=false;
    }
    if(valorqtd=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro3').innerHTML= msg_erro;
        avancar=false;
    }
    else
    {
        console.log(valorqtd.indexOf(','));
        if(valorqtd.indexOf(',') !== -1)
        {
            msg_erro='As casas decimais devem ser separadas por ponto!';
            modalerro(msg_erro);
            document.getElementById('erro3').innerHTML= msg_erro;
            avancar=false;
        }
    }
    if(valorCategoria=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro4').innerHTML= msg_erro;
        avancar=false;
    }
    return avancar;

}
function validarCarrinho()
{
    let valorQtd=document.forms['form-carrinho']['qtd'].value;
    let valorQtd_disponivel=document.forms['form-carrinho']['qtd_disponivel'].value;
    let msg_erro='';
   
    let avancar=true;
    if(valorQtd.indexOf(',')!==-1 || valorQtd.indexOf('.')!==-1)
    {
        msg_erro='Digite um numero inteiro!';
        modalerro(msg_erro);
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
    }
    if(valorQtd>valorQtd_disponivel)
    {
        msg_erro='Quantidade maior do que a disponivel no estoque!';
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
    }
    return avancar;

}
function validarLancamento()
{
    let valoraParcela=document.forms['form-lancamento']['ValoraParcela'].value;
    let valorParcelado=document.forms['form-lancamento']['valorParcelado'].value;
    let dataVencimento=document.forms['form-lancamento']['data_vencimento'].value;
    let tipo=document.forms['form-lancamento']['tipo'].value;
    let nome=document.forms['form-lancamento']['description'].value;
    let Valortotal=document.forms['form-lancamento']['valueTotal'].value;
    let data_compra=document.forms['form-lancamento']['data_compra'].value;
    let cliente_id=document.forms['form-lancamento']['cliente_id'].value;
    let msg_erro='';
    let avancar=true;
    if(valoraParcela>valorParcelado)
    {
        msg_erro='Você não parcelou todo o valor!';
        modalerro(msg_erro);
        document.getElementById('erro7').innerHTML= msg_erro;
        document.getElementById('erro6').innerHTML= msg_erro;
        document.getElementById('erro') .style.backgroundColor= 'red';
        document.getElementById('parcelamento') .style.backgroundColor= 'red';
        avancar=false;
    }
    if(nome=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
    }
    if(Valortotal=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro2').innerHTML= msg_erro;
        avancar=false;
    }
    if(data_compra=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro3').innerHTML= msg_erro;
        avancar=false;
    }
    if(cliente_id=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro4').innerHTML= msg_erro;
        avancar=false;
    }
    if(tipo=='')
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro5').innerHTML= msg_erro;
        avancar=false;
    }

    return avancar;

}
function validarBaixarlancamento()
{
    let data_pagamento=document.forms['form-baixa-lancamento']['data_pagamento'].value;
    let valor_recebido=document.forms['form-baixa-lancamento']['valor_recebido'].value;
    let msg_erro='';
   
    let avancar=true;
    if(data_pagamento=="")
    {
        msg_erro='Campo Obrigatorio!';
        modalerro(msg_erro);
        document.getElementById('erro1').innerHTML= msg_erro;
        avancar=false;
    }
    if(valor_recebido=='')
    {
        msg_erro='Campo Obrigatorio!';
        document.getElementById('erro2').innerHTML= msg_erro;
        avancar=false;
    }
    return avancar;

}
// function validarPedidovenda()
// {
//     let valorStory=document.forms['form-pedido-venda']['story_id[]'].value;
//     let msg_erro='';
//     let avancar=true;
//     console.log(valorStory);
//     if(valorStory=='')
//     {
//         msg_erro='Campo Obrigatorio!';
//         modalerro(msg_erro);
//         document.getElementById('erro1').innerHTML= msg_erro;
//         avancar=false;
//     }
//     return avancar;

// }
function modalerro(msg_erro)
{
    Swal.fire({
        icon: 'warning',
        title: 'Error',
        text: `${msg_erro}`,
        showConfirmButton: true,
      })   
}