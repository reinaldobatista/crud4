
let content = document.getElementById('ajax-content')
function fetchContent(el) {
    let view=el.getAttribute('a-view')
    let folder=el.getAttribute('a-folder')
    fetch(`/${folder}/${view}`)
    .then(response => {
        let html = response.text()
        return html
    })
    .then(html => {
        content.innerHTML=html
    })

}
    $(document).ready(function(){
        $('#valueTotal').mouseover(function(){
            let valor= document.querySelector('#valueTotal').value
            document.querySelector('#ValoraParcela').value=valor;
           
        })
    })
     $(document).ready(function(){
        $('#story_story').on('change',function(){
            var selectorValor='#'+$(this).val();
            $('#pai').children('div').hide();
            $('#pai').children(selectorValor).show();
        })
        

    })
    $(document).ready(function(){
        $('#lancamento').on('click',function(){
            $('#pai').children('div').hide();
            $('#pai').children('#filho1').show();
        })
        

    })
    $(document).ready(function(){
        $('#parcelamento').on('click',function(){
            $('#pai').children('div').hide();
            $('#pai').children('#filho2').show();
            document.getElementById('erro') .style.backgroundColor= '';
            document.getElementById('parcelamento') .style.backgroundColor= '';
            let valor= document.querySelector('#valueTotal').value
            document.querySelector('#ValoraParcela').value=valor;
        })
        

    })
    $(document).ready(function(){
        $("#tipo").on('change',event => {
          
            $.get(`/financeiro/teste/${event.target.value}`, function(res, sta){
                $("#produtos").empty();
                res.forEach(element => {
                    $("#produtos").append(`<option value=${element.id}> ${element.name} </option>`);
                });
            });
        });
        

    })
    $(document).ready(function(){
        $("#products_id").on('change',event => {
          
            $.get(`/deposito/FilterSelect/${event.target.value}`, function(res, sta){
                $("#category_id").empty();
                res.forEach(element => {
                    console.log(element);
                    $("#category_id").append(`<option value=${element.id}> ${element.category} </option>`);
                });
            });
        });
        

    })
    $(document).ready(function(){
        $("#story_id").on('change',event => {
            $.get(`/deposito/FilterSelect/story/${event.target.value}`, function(res, sta){
                $("#products_id").empty();
                $("#products_id").append(`<option value=""> Selecione um Produto </option>`);
                res.forEach(element => {
                    console.log(element);
                    $("#products_id").append(`<option value=${element.id}> ${element.name} </option>`);
                });
            });
        });
        

    })
  
 
  




    




