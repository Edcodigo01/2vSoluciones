

    function ajaxArticles(url,desdeArticle,button){

        category = $(button).parents('.card-body').find('.filterCategory').val();

        tag = $(button).parents('.card-body').find('.filterTag').val();
        search = $(button).parents('.card-body').find('.filterSearch').val();

        $('.filterCategory').val(category);
        $('.filterTag').val(tag);
        $('.search').val(search);


        if(category == undefined){
            category = '';
        }
        if(tag == undefined){
            tag = '';
        }
        if(category == '' && tag == '' && search == ''){

            $('.deleteSearch').hide();
        }else{
            $('.deleteSearch').show();
        }

        if(desdeArticle == 'si'){
            url_base = $('#url_base').val();


            categoria = $('select[id="filterCategory"] option:selected').text();
            tag = $('select[id="filterTag"] option:selected').text();
            busqueda = $('select[name="busqueda"] option:selected').text();
            window.location.href = url_base+'/articulos?busqueda='+busqueda+'&categoria='+categoria+'&tag='+tag;
            return

        }

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method:'get',
            url:url,
            data:{'category':category,'tag':tag,'search':search,},
            error:function(error){
                console.log(error);
                hideLoader();
                lista = "";

                warning('Hubo un error al traer los datos solicitados');
            },
            success:function(result){
                if(result.result == 'error'){
                    warning(result.message);
                }
                $('#viewAjax').html(result);
                $('.titleArticle').html('Artículos');

                if(search != undefined && search != ''){
                    $('.showSearch').show();
                    $('.textShowSearch').html(search);

                }else{
                    $('.showSearch').hide();
                }
                if(category != undefined && category != ''){

                    $('.showCategory').show();
                    categoryText = $(button).parents('.card-body').find(".filterCategory option:selected").html();
                    $('.textShowCategory').html(categoryText);

                }else{
                    $('.showCategory').hide();
                }
                if(tag != undefined && tag != ''){
                    $('.showTag').show();
                    tagText = $(button).parents('.card-body').find(".filterTag option:selected").html();
                    $('.textShowTag').html(tagText);

                }else{
                    $('.showTag').hide();
                }
                $('html, body').animate({
                    scrollTop: $("#scrollPaginate").offset().top
                }, 500);

                window.history.pushState('', '', '/2v/articulos');
                // window.history.pushState('', '', 'articulos');
                $('.filterMdArticle').hide();
                $('.filterMdArticles').show();


                hideLoader();

            }
        });

    }

    $(document).on("click", ".categoryS", function(e){
        e.preventDefault();
        showLoader();
        var value = $(this).attr('data-val');

        $('.filterCategory').val(value);
        $('.filterTag').val('');
        $('.filterSearch').val('');
        url_base = $('#url_base').val();
        url = url_base+'/articulos_ajax?page=1';

        ajaxArticles(url,'no','.filterCategory');
    });

    $(document).on("click", ".tagS", function(e){
        e.preventDefault();
        showLoader();
        var value = $(this).val();
        $('.filterCategory').val('');
        $('.filterTag').val(value);
        $('.filterSearch').val('');
        url_base = $('#url_base').val();
        url = url_base+'/articulos_ajax?page=1';
        ajaxArticles(url);
    });


    $(document).on("click", "#searchDesdeArticle", function(e){

        ajaxArticles('url','si');
    });

    $(document).on("click", ".searchArticles", function(e){
        e.preventDefault();
        showLoader();
        url_base = $('#url_base').val();
        url = url_base+'/articulos_ajax?page=1';

        ajaxArticles(url,'no',this);
    });

    $(document).on("click", ".deleteSearch, #todos", function(e){
        e.preventDefault();
        showLoader();
        $('.deleteSearch').hide();

        $('.filterCategory').val('');
        $('.filterTag').val('');
        $('.filterSearch').val('');

        url_base = $('#url_base').val();
        url = url_base+'/articulos_ajax?page=1';
        ajaxArticles(url);
    });
