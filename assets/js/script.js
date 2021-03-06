$(function () {
    $('#showAddModal').on('click', function () {
        $('#formModalLabel').html('Tambah Pokemon');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('.modal-body form').attr('action', 'http://localhost/Pokedex/admin');

        $('#name').val('');
        $('#category').val('');
        $('#ability').val('');
        $('#description').val('');
        $('#bgcolor').val('');
        $('#pokemon_id').val('');

        $('.selectpicker').removeClass('strings');
        $('.selectpicker option').prop('selected', false).trigger('change');
    });

    $('.showEditModal').on('click', function () {
        $('#formModalLabel').html('Ubah Pokemon');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', 'http://localhost/Pokedex/admin/edit');

        $('.selectpicker').removeClass('strings').addClass("strings");
        $('.selectpicker option').prop('selected', false).trigger('change');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/Pokedex/admin/getPokemonJSON',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#name').val(data.name);
                $('#category').val(data.category_id);
                $('#ability').val(data.ability_id);
                $('#description').val(data.description);
                $('#bgcolor').val(data.bgcolor);
                $('#pokemon_id').val(data.pokemon_id);
            }
        })

        $.ajax({
            url: 'http://localhost/Pokedex/admin/getPokemonTypeJSON',
            data: { id: id },
            method: 'post',
            cache: false,
            success: function (data) {
                var item = data;
                var val1 = item.replace("[", "");
                var val2 = val1.replace("]", "");
                var values = val2;
                $.each(values.split(","), function (i, e) {
                    $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                    $(".strings").selectpicker('refresh');
                });
            }
        })
    });

    $('.showDeleteModal').on('click', function () {
        const id = $(this).data('id');
        $('.modal-footer a').attr('href', 'http://localhost/Pokedex/admin/delete/' + id);
    });

    $('[data-toggle="popover"]').popover()

    var figcap_size = $('#pokemon figure').length;
    var x = 4

    $('#pokemon figure:lt(' + x + ')').show();

    pokemon(0);
    $('#load_more').on('click', function (e) {
        e.preventDefault();
        var page = $(this).data('val');
        pokemon(page);
        x = (x + 3 <= figcap_size) ? x + 3 : figcap_size;
        $('#pokemon figure:lt(' + x + ')').show();
        $(this).toggle(x < figcap_size);
    });

    $('#keyword').on('keyup', function () {
        $.ajax({
            url: 'http://localhost/Pokedex/home/getPokemon',
            method: 'GET',
            data: { keyword: $(this).val() },
            success: function (data) {
                $('#pokemon').html(data);
                var figcap_size = $('#pokemon figure').length;
                if (figcap_size < 10 && keyword !== '') {
                    $('#load_more').hide();
                } else {
                    $('#load_more').show();
                    $('#load_more').data('val', 1);
                }
            }
        })
    })

});

var pokemon = function (page) {
    $.ajax({
        url: 'http://localhost/Pokedex/home/getPokemon',
        type: 'GET',
        data: {
            page: page,
        }
    }).done(function (data) {
        $('#pokemon').append(data);
        $('#load_more').data('val', ($('#load_more').data('val') + 1));
    })
}