<script src="{{ URL::asset('/publico/js/jquerymask_cpfcnpj.js') }}"></script>
<script>
    var options = {
        onKeyPress: function(cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask(
        '000.000.000-00#', options);

    // segunda mask de cpf na tela de cadastro
    var options = {
        onKeyPress: function(cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cpfOuCnpj2').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('.cpfOuCnpj2').length > 11 ? $('.cpfOuCnpj2').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj2').mask(
        '000.000.000-00#', options);
</script>
