
$(document).ready(function(){ effects.loader.hide(); });

$(document).ajaxStart(function(){ effects.loader.show(); });
$(document).ajaxComplete(function(){ effects.loader.hide(); });

$(function(){
    "use strict";
    
    plugins().tootip();  
    
    // Wizard
    if($(".wizard").length > 0){
        
        var validationWizard = function(element){
            var countEmpty = 0;
            $(element).each(function(key, value){

                if($(this).val() == ""){
                    $(this).parent().addClass("has-error");
                    countEmpty++;
                }else{
                    $(this).parent().removeClass("has-error");
                }

            });

            if(countEmpty > 0){
                return false;
            }else{
                return true;
            }
        };
        
        if($(".wizardNewClient").length > 0){
            
            plugins().wizard(".wizard",
                function(){
                    return true;
                },
                function(){
                    $(".wizardNewClient").submit();
                });
            
            var count = 0;
            $(".wizardNewClient").on("click", ".btn-add-fields", function(){

                var row =   "<div class=\"row\">"+
                            "   <div class=\"col-md-1\">"+
                            "       <button type=\"button\" class=\"btn btn-default btn-remove remove\"><i class=\"fa fa-trash-o\"></i></button>"+
                            "   </div>"+
                            "   <div class=\"col-md-5\">"+
                            "       <div class=\"form-group\">"+
                            "           <label for=\"nome-dependente-"+count+"\">Nome</label>"+
                            "           <input type=\"text\" class=\"form-control\" id=\"nome-dependente-"+count+"\">"+
                            "       </div>"+
                            "   </div>"+
                            "   <div class=\"col-md-3\">"+
                            "       <div class=\"form-group\">"+
                            "           <label for=\"cpf-dependente-"+count+"\">CPF</label>"+
                            "           <input type=\"text\" class=\"form-control\" id=\"cpf-dependente-"+count+"\">"+
                            "       </div>"+
                            "   </div>"+
                            "   <div class=\"col-md-3\">"+
                            "       <div class=\"form-group\">"+
                            "           <label for=\"data-nascimento-dependente-"+count+"\">Data nascimento</label>"+
                            "           <input type=\"text\" class=\"form-control\" id=\"data-nascimento-dependente-"+count+"\">"+
                            "       </div>"+
                            "   </div>"+
                            "   <div class=\"col-md-12\">"+
                            "       <hr class=\"divider-dotted\">"+
                            "   </div>"+
                            "</div>";

                $(".wizardNewClient #dependentes").append(row);

                count++;

                if(count > 0 && $(".wizardNewClient #dependentes .alert").length > 0){
                    $(".wizardNewClient #dependentes .alert").slideUp("150");
                }

            });

            $(".wizardNewClient").on("click", ".remove", function(){

                var parent = $(this).parent().parent();
                parent.slideUp("200", function(){
                    parent.remove();                
                });

                if(count > 0){
                    count--;
                }

                if(count < 1){
                    $(".wizardNewClient #dependentes .alert").slideDown("150");
                }

            });

        }
        
        if($(".wizardNewOperador").length > 0){
                        
            plugins().wizard(".wizard",
                function(event, currentIndex, newIndex){
                    return validationWizard(".wizardNewOperador section.dados-operador *:required");
                },
                function(){
                    
                    var _return = validationWizard(".wizardNewOperador section.endereco *:required");
                    
                    if(_return === true){
                        $(".wizardNewOperador").submit();
                    }else{
                        return false;
                    }
                    
                });
        }

    }
    
    /*
     * Date Range Picker
     */
    if($('#dateRangePicker').length > 0){
        $('#dateRangePicker').daterangepicker({
            ranges: {
                'Hoje': [moment(), moment()],
                'Ontem': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Últimos 7 dias': [moment().subtract('days', 7), moment()],
                'Ultimos 30 dias': [moment().subtract('days', 30), moment()],
                'Mês atual': [moment().startOf('month'), moment().endOf('month')],
                'Último Mês': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
             },
            format: 'DD/MM/YYYY',
            locale: {
                applyLabel: 'Aplicar',
                cancelLabel: 'Cancelar',
                fromLabel: 'De',
                toLabel: 'Até',
                weekLabel: 'W',
                customRangeLabel: 'Personalizar Filtro'
            }
        });
    }
    
    // Mask
    if($(".mask").length > 0){
        plugins().mask();
    }
        
    /*
     * Price Format
     */
    if($(".priceFormat").length > 0){
        plugins().priceFormat();
    }
    
    /*
     * Somente Número
     */
    $("body").on("keypress", ".onlyNumber", function(e){
        return plugins().somenteNumero(e);
    });
    
    // Remove
    if($("*[data-action=delete]").length > 0){
        
        if($("*[data-type=operador]").length > 0){
            
            $("*[data-type=operador]").on("click", function(){
                var $this = $(this);
               
                var response = plugins().windowDialog("Deseja realmente remover este operador?");
                
                if(response){
                    request($this.attr("data-url"), "POST", $this.attr("data-json"), "json", true, function(response){
                        if(response.status === "success"){
                            $this.parents("tr").remove();
                        }
                    });
                }    
            });
            
        }
        
        if($("*[data-type=base]").length > 0){
            
            $("*[data-type=base]").on("click", function(){
                var $this = $(this);
               
                var response = plugins().windowDialog("Deseja realmente remover esta base?");
                
                if(response){
                    request($this.attr("data-url"), "POST", $this.attr("data-json"), "json", true, function(response){
                        if(response.status === "success"){
                            $this.parents("tr").remove();
                        }
                    });
                }    
            });
            
        }
        
        if($("*[data-type=cliente]").length > 0){
            
            $("*[data-type=cliente]").on("click", function(){
                var $this = $(this);
               
                var response = plugins().windowDialog("Deseja realmente remover este cliente?");
                
                if(response){
                    request($this.attr("data-url"), "POST", $this.attr("data-json"), "json", true, function(response){
                        if(response.status === "success"){
                            $this.parents("tr").remove();
                        }
                    });
                }    
            });
            
        }
        
    }
    
    /*
     * Table Sorter
     */
    if($("*[data-sortable]").length > 0){
        plugins().tableSorter("*[data-sortable]");
    }
    
});

/* Forms */
$("body").on('submit', 'form', function(e){
    
    var _form_ = $(this);
    
    // Caso o formulario possua uma classe chamada no-ajax a requisição irá utilizar o método tradicional de envio
    if(_form_.hasClass("no-ajax")){
        return true;
    }
    
    e.preventDefault();

    request(_form_.attr("action"), _form_.attr("method"),_form_.serialize(), "json", true, function(response){

        if(response.status == "success"){
            plugins().notify("Sucesso", response.message, response.status);

            /* Reset Form */
            if(_form_.find("input[name=resetForm]").length > 0){
                plugins().resetForm(_form_);
            }

            /* Redirecionar Página */
            if(_form_.find("input[name=redirect]").length > 0){
                window.location.href = _form_.find("input[name=redirect]").val();
            }

        }else{
            plugins().notify("Oops", response.message, response.status);
        }

    });

});

var plugins = function(){
    return{   
        tableSorter: function(element){
            $(element).tablesorter(); 
        },
        windowDialog: function(message, callback){
            return confirm(message);
        },
        notify: function(title,text,type,removeAll){
    
            if(removeAll == true){
                $.pnotify_remove_all();
            }
    
            $.pnotify({
                title: title,
                text: text,
                type: type,
                history: false
            });
        },
        tootip: function(){
            $("*[title]").tooltip();
        },
        resetForm: function(form){
            $(form).find(':input').each(function(){ 
                switch(this.type) { 
                    case 'password': 
                    case 'select-multiple': 
                    case 'select-one': 
                    case 'text': 
                    case 'textarea': 
                        $(this).val(''); 
                        break; 
                    case 'checkbox': 
                    case 'radio': 
                        this.checked = false; 
                } 
            });
        },
        somenteNumero: function(e, virgula) {

            var tecla = (window.event) ? event.keyCode : e.which;

            if (virgula == true) {
                if (tecla == 44) {
                    return true;
                }
            }

            if (tecla >= 46 && tecla < 58)
                return true;
            else {
                if (tecla == 8 || tecla == 0 || tecla == 190)
                    return true;
                else
                    return false;
            }
        },
        priceFormat: function(){
            $('.priceFormat').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.'});
        },
        modal: function(p){
                        
            var modal = p.selectorModal ? $(p.selectorModal) : $("#modal");
            var _loading_ = $(".loading");

            if (modal.find(".modal-dialog").hasClass("modal-lg")) {
                modal.find(".modal-dialog").removeClass("modal-lg");
            }
            if (modal.find(".modal-dialog").hasClass("modal-sm")) {
                modal.find(".modal-dialog").removeClass("modal-sm");
            }
            
            var json_datas = typeof p.datas !== "undefined" ? p.datas : {};
            var title = typeof p.title !== "undefined" ? p.title : "Titulo";
            var type_modal = typeof p.type !== "undefined" ? p.type : "";

            _loading_.show();

            $.ajax({

                url: p.url,
                type: "POST",
                data: json_datas,
                //dataType: "json",
                success: function(response){
                    
                    if(response === '{"isLogged":false}'){
                        $("#modalLogin").modal({
                            remote: base_url+"conta/loginModal",
                            backdrop: 'static',
                            keyboard: false
                        });
                    }else{
                        modal.find(".modal-title").html(title);
                        modal.find("#conteudo").html(response);

                        if(type_modal !== ""){
                            modal.find(".modal-dialog").addClass(type_modal);
                        }

                        modal.modal();
                        _loading_.hide();
                    }
                    
                },
                error: function(response){

                    alert("Error: "+response);

                    // Notificação de error
                    modal.modal('hide');
                    _loading_.hide();

                },
                fail: function(response){

                    alert("Fail");

                    // Notificação de falha
                    modal.modal('hide');
                    _loading_.hide();

                }

            });

            
        },
        mask: function(){
            $(".mask-cpf").mask("999.999.999-99");
            $(".mask-cep").mask("99999-999");
            $(".mask-telefone").mask("(99) 9999-9999?9");
            $(".mask-cpf").mask("999.999.999-99");
        },
        popover: function(){
            $('*[data-toggle=popover]').popover();
        },
        wizard: function(element, onStepChanging, onFinished){
            $(element).steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "fade",
                autoFocus: true,
                labels:{
                    pagination:"Paginação",
                    finish:"Finalizar",
                    next:"Próximo",
                    previous:"Anterior",
                    loading:"Carregando ..."
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    return onStepChanging(event,currentIndex,newIndex);
                },
                onFinished: function(event, currentIndex) {
                    onFinished(event,currentIndex);
                }
            });
        }
    }
}

var request = function(url, type, data, dataType, async, callback){
    
    var req = $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: dataType,
        success: function(response){               

            if(typeof callback !== "undefined"){
                callback(response);
            }

        },
        error: function(){
            plugins().notify("Problema na solicitação", "Ocorreu um problema na solicitação.", "error");
        },
        fail: function(){
            plugins().notify("Falha na solicitação", "Ocorreu uma falha durante a solicitação.", "error");
        }

    });

    return req;

}

var effects = {
    loader: {
        show: function(){
            $("#loader").fadeIn(150);
        },
        hide: function(){
            $("#loader").fadeOut(150);
        }
    }
}
