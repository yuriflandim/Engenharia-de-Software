
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
        
        if($(".mask-cpf").length > 0){
            $(".mask-cpf").on("blur", function(){
                var value = $(this).val();
                if(value != ""){
                    
                    value = value.replace(".","").replace(".","").replace("-","");
                    
                    $(this).parent(".form-group").find("label em").remove();
                    
                    
                    if(plugins().validaCpf(value) === false){
                        //plugins().notify("Oops","Cpf inválido", "error");
                        $(this).val("").parent(".form-group").addClass("has-error").find("label").append("<em class=\"small\"> (Informe um CPF válido)</em>");
                        $(this).focus();
                    }else{
                        $(this).parent(".form-group").removeClass("has-error").addClass("has-success");
                    }
                    
                }
            });
        }
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
    
    // Filter
    if($("select#filterBases").length > 0){
        $("select#filterBases").on("change", function(){
            
            var _this = $(this);
            
            request(base_url+"base/filter/"+$(this).val(), "GET",{}, "json", true, function(retorno){
                
                var _table_imposto = $("#tableImposto tbody");
                var _table_inss = $("#tableInss tbody");
                //var _table_dependente = $("#tableDependente tbody");
                
                _table_imposto.html("");
                _table_inss.html("");
                //_table_dependente.html("");
                 
                if(retorno.imposto.length > 0){       
                    $.each(retorno.imposto, function(key, value){

                        // --- Imposto
                        var rows = "";

                        var base = "";

                        var _valor_final = parseFloat(value.valor_final);
                        var _valor_inicial = parseFloat(value.valor_inicial);

                        if(_valor_final > 0){
                            if(_valor_inicial > 0){
                                base = "De R$ "+_valor_inicial.formatMoney(2,",",".")+" até R$ "+_valor_final.formatMoney(2,",",".");
                            }else{
                                base = " Até R$ "+_valor_final.formatMoney(2,",",".");
                            }
                        }else{
                            base = "Acima de R$ "+_valor_inicial.formatMoney(2,",",".");
                        }

                        // Btn action
                        var _btn;

                        if(value.ano_virgencia == new Date().getFullYear()){
                            _btn = "<button type=\"button\" class=\"btn btn-default\" title=\"Remover base\" data-action=\"delete\" data-type=\"base\" data-url=\""+(base_url+"base/deleteProcess/"+value.id)+"\"><i class=\"fa fa-trash-o\"></i></button>";
                        }else{
                            _btn = "<button type=\"button\" class=\"btn btn-default disabled\" disabled><i class=\"fa fa-trash-o\"></i></button>";
                        }

                        rows += "<tr>";
                        rows += "   <td class=\"text-center\">"+base+"</td>";
                        rows += "   <td class=\"text-center\">"+(parseFloat(value.aliquota) > 0 ? parseFloat(value.aliquota).formatMoney(2,",","")+"%" : "-")+"</td>";
                        rows += "   <td class=\"text-center\">"+(parseFloat(value.parcela_deduzir) > 0 ? "R$ "+parseFloat(value.parcela_deduzir).formatMoney(2,",","") : "-")+"</td>";
                        rows += "   <td class=\"text-center\">"+_btn+"</td>";
                        rows += "</tr>";

                        _table_imposto.append(rows);

                    });
                }else{
                    _table_imposto.html("<tr><td colspan=\"4\" class=\"text-center\"> Nenhuma base identificada para esse ano </td></tr>");    
                }
                        
                if(retorno.inss.length > 0){  
                    $.each(retorno.inss, function(key, value){
                        
                        var rows = "";

                        var base = "";

                        var _valor_final = parseFloat(value.valor_final);
                        var _valor_inicial = parseFloat(value.valor_inicial);

                        if(_valor_final > 0){
                            if(_valor_inicial > 0){
                                base = "De R$ "+_valor_inicial.formatMoney(2,",",".")+" até R$ "+_valor_final.formatMoney(2,",",".");
                            }else{
                                base = " Até R$ "+_valor_final.formatMoney(2,",",".");
                            }
                        }else{
                            base = "Acima de R$ "+_valor_inicial.formatMoney(2,",",".");
                        }

                        // Btn action
                        var _btn;

                        if(value.ano_virgencia == new Date().getFullYear()){
                            _btn = "<div class=\"btn-group\">";        
                            _btn += "   <a href=\""+base_url+"inss/editar/"+value.id+"\" class=\"btn btn-default\" title=\"Editar\"><i class=\"fa fa-edit\"></i></a>";
                            _btn += "   <button type=\"button\" class=\"btn btn-default\" title=\"Remover base\" data-action=\"delete\" data-type=\"base\" data-url=\""+(base_url+"base/deleteProcess/"+value.id)+"\"><i class=\"fa fa-trash-o\"></i></button>";
                            _btn += "</div>";
                        }else{
                            _btn = "<div class=\"btn-group\">";        
                            _btn += "   <button type=\"button\" class=\"btn btn-default disabled\" disabled><i class=\"fa fa-edit\"></i></button>";
                            _btn += "   <button type=\"button\" class=\"btn btn-default disabled\" disabled><i class=\"fa fa-trash-o\"></i></button>";
                            _btn += "</div>";
                        }

                        rows += "<tr>";
                        rows += "   <td class=\"text-center\">"+base+"</td>";
                        rows += "   <td class=\"text-center\">"+(parseFloat(value.aliquota) > 0 ? parseFloat(value.aliquota).formatMoney(2,",","")+"%" : "-")+"</td>";
                        rows += "   <td class=\"text-center\">"+_btn+"</td>";
                        rows += "</tr>";

                        _table_inss.append(rows);

                    });
                    
                }else{
                    _table_inss.append("<tr><td colspan=\"4\" class=\"text-center\"> Nenhuma base identificada para esse ano </td></tr>");
                }

            });
        });
    }
    
    // Remove
    $("body").on("click", "*[data-action=delete]", function(){
        
        var response = false;
        var _this = $(this);
        
        switch (_this.attr("data-type")){
            case "operador":
                response = plugins().windowDialog("Deseja realmente remover este operador?");
                break;
            case "base":
                response = plugins().windowDialog("Deseja realmente remover esta base?");
                break;
            case "cliente":
                response = plugins().windowDialog("Deseja realmente remover este cliente?");
                break;
            default :
                break;
        }
        
        if(response){
            request(_this.attr("data-url"), "POST", _this.attr("data-json"), "json", true, function(response){
                if(response.status === "success"){
                    _this.parents("tr").remove();
                }else{
                    plugins().notify(response.title, response.message, response.status);
                }
            });
        }
        
    });
    
    /*
     * Table Sorter
     */
    if($("*[data-sortable]").length > 0){
        plugins().tableSorter("*[data-sortable]");
    }
    
    /* DataTable*/
    if ($('.dataTable').length > 0) {
        plugins().dataTable('.dataTable');
    }
    
    /* 
     * Lista cidades
     */
    $("body").on("change", "select.estado", function(){
        
        var $this = $(this);
        
        if($this.val() != ""){
            webService().getCitys($this.attr("data-parent")+" select.cidade", $(this).val());
        }else{
            $($this.attr("data-parent")+" select.cidade").html("<option> -- Selecione um estado -- </option>");
        }
    });
    
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
        dataTable: function(element){
            
            /*  
            
            var t = $(element).dataTable({
                destroy: true,
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
              });
            var t = $(element).DataTable({
                destroy: true,
                "sDom": "<'row no-margin'<''<'col-lg-1 no-padding-left margin-bottom-30'l><'col-lg-5'><'col-lg-6 no-padding-right margin-bottom-30'f>r>t<'row'<'col-lg-4'i><'col-lg-8'p>>>",
                "oTableTools": {},
                "oLanguage": {
                    "sSearch": "<span></span> _INPUT_",
                    "sLengthMenu": "",//"<span>_MENU_</span>",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sLast": "Último",
                        sNext: "Próximo",
                        sPrevious:"Anterior"
                    },
                    sEmptyTable: "Nenhuma informação disponível na tabela",
                    sInfoEmpty: "",
                    sInfo: "Exibindo _START_ a _END_ registros em um total de _TOTAL_",
                    sInfoFiltered: "Filtro em um total de _MAX_ registros",
                    sZeroRecords: "Nenhum registro encontrado para essa busca"
                }
            });
            */
            //$('.dataTables_filter>label>input').attr("placeholder", "Pesquisar...").addClass('form-control').css("width","100%").addClass('input-lg').parent().addClass("col-lg-12 no-padding-right");
            
            //return t;
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
        },
        validaCpf: function(strCPF){
            var Soma;
            var Resto;
            Soma = 0;
            
            if (strCPF == "00000000000" || strCPF == "11111111111" || strCPF == "22222222222" || strCPF == "33333333333" || strCPF == "44444444444" || strCPF == "55555555555" || strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "99999999999") return false;
            
            for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
            
            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11)) Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10))) return false;
            
            Soma = 0;
            for (i = 1; i <= 10; i++){
                Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
            }
            
            Resto = (Soma * 10) % 11;
            if ((Resto == 10) || (Resto == 11)) Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11))) return false;
            
            return true;
            
        }
    }
}

var webService = function(){
    return {
        getStates: function(selector){
            request(base_url+"webService/getStates", "GET",{}, "json", true, function(retorno){
                
                var options = "";
                
                $.each(retorno, function(key, value){
                    options += "<option value=\""+value.id_estado+"\">"+value.nome+"</option>";
                });
                
                $(selector).html(options);
                
            });
        },
        getCitys: function(selector, id_estado){
            
            request(base_url+"webService/getCitys/"+id_estado, "GET",{}, "json", true, function(retorno){
                
                var options = "";
                $.each(retorno, function(key, value){
                    options += "<option value=\""+value.id+"\">"+value.nome+"</option>";
                });
                $(selector).html(options);
                
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

Number.prototype.formatMoney = function(g, h, k) {
    var e = this, g = isNaN(g = Math.abs(g)) ? 2 : g, h = h == undefined ? "." : h, k = k == undefined ? "," : k, f = e < 0 ? "-" : "", a = parseInt(e = Math.abs(+e || 0).toFixed(g)) + "", b = (b = a.length) > 3 ? b % 3 : 0;
    return f + (b ? a.substr(0, b) + k : "") + a.substr(b).replace(/(\d{3})(?=\d)/g, "$1" + k) + (g ? h + Math.abs(e - a).toFixed(g).slice(2) : "");
};