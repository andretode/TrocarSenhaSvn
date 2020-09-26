function ValidacaoViewModel(){
    const self = this
    self.senha1 = ko.observable("")
    self.senha2 = ko.observable("")
    self.isForcaSenhaAdequada = ko.observable(false)
    self.isConfirmacaoValida = ko.observable(false)
    self.temTamanhoMin = ko.observable(false)
    self.validarConfirmacao = function(data, event) {
        const senha2 = event.currentTarget.value
        const duasSaoIguais = self.senha1() == senha2
        self.isConfirmacaoValida(duasSaoIguais)
    }
    self.avaliarForca = function(event, score){
        self.isForcaSenhaAdequada(score.verdictLevel >= 3)
    }

    $("#senha1").attr("data-bind", "value: senha1, event: { change: validarConfirmacao }")
    $("#senha1Help").attr("data-bind", "visible: !isForcaSenhaAdequada()")
    $("#senha2").attr("data-bind", "value: senha2, event: { keyup: validarConfirmacao }")
    $("#senha2Help").attr("data-bind", "visible: !isConfirmacaoValida()")
    $("#btnSalvar").attr("data-bind", "enable: isForcaSenhaAdequada() && isConfirmacaoValida()")
}

$(function(){
    const traducaoPtBr = {
        "wordMinLength": "Sua senha é muito curta",
        "wordMaxLength": "Sua senha é muito longa",
        "wordInvalidChar": "Sua senha contém um caractere inválido",
        "wordNotEmail": "Não use seu e-mail como senha",
        "wordSimilarToUsername": "Sua senha não pode conter o seu nome de usuário",
        "wordTwoCharacterClasses": "Use diferentes classes de caracteres",
        "wordRepetitions": "Muitas repetições",
        "wordSequences": "Sua senha contém sequências",
        "errorList": "Erros:",
        "veryWeak": "Muito Fraca",
        "weak": "Fraca",
        "normal": "Normal",
        "medium": "Média",
        "strong": "Forte",
        "veryStrong": "Muito Forte"
    }
    const validacaoViewModel = new ValidacaoViewModel()
    ko.applyBindings(validacaoViewModel);

    let options = {
        common: { onKeyUp: validacaoViewModel.avaliarForca },
        ui: { showVerdictsInsideProgressBar: true },
        i18n: { t: (key) => traducaoPtBr[key] }
    }
    $('#senha1').pwstrength(options);
})