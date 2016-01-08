var form,
    formElements;

form = document.getElementById("newUser");

formElements = [
    new CheckBox(
        form,
        "conditions",
        [{
            "name" : "value",
            "value" : "acepted"
        }],
        [],
        "He leído y acepto las condiciones legales" +
            " establecidas por Jardinería Ácida S.L",
        true
    ), new Input(
        form,
        "name",
        [{
            "name" : "placeholder",
            "value" : "my name"
        }],
        [{
            "type" : "regExp",
            "regExp" : /.+/
        }],
        "text",
        true
    ), new Input(
        form,
        "surname",
        [{
            "name" : "placeholder",
            "value" : "surname1 surname2..."
        }],
        [{
            "type" : "regExp",
            "regExp" : /.+/
        }],
        "text",
        true
    ), new Input(
        form,
        "email",
        [{
            "name" : "placeholder",
            "value" : "myemail@mail.com"
        }],
        [{
            "type" : "regExp",
            "regExp" : /^[A-Z0-9]+@[A-Z0-9]+\.[A-Z0-9]+$/i
        }],
        "email",
        true
    ), new Input(
        form,
        "password",
        [{
            "name" : "placeholder",
            "value" : "123abc"
        }],
        [{
            "type" : "regExp",
            "regExp" : /(?!^[0-9]*$)(?!^[a-z]*$)^([a-z0-9]{6,})$/i
        }],
        "password",
        true
    ), new Input(
        form,
        "confirm password",
        [{
            "name" : "placeholder",
            "value" : "123abc"
        }],
        [{
            "type" : "regExp",
            "regExp" : /(?!^[0-9]*$)(?!^[a-z]*$)^([a-z0-9]{6,})$/i
        }, {
            "type" : "confirm",
            "with" : "password"
        }],
        "password",
        true
    ), new Input(
        form,
        "birthday",
        [],
        [{
            "type" : "regExp",
            "regExp" : /^[\d]{4}\-[\d]{2}\-[\d]{2}$/
        }, {
            "type" : "function",
            "function" : "isCorrectDate"
        }],
        "date",
        false
    ), new RadioGroup(
        form,
        "sex",
        [],
        [],
        [
            "man",
            "woman"
        ],
        false
    ), new Input(
        form,
        "telophon",
        [{
            "name" : "placeholder",
            "value" : "987654321"
        }],
        [{
            "type" : "regExp",
            "regExp" : /^9[12345678][\d]{7}$/
        }],
        "tel"
    ), new Input(
        form,
        "URL",
        [{
            "name" : "placeholder",
            "value" : "www.misite.com"
        }],
        [{
            "type" : "regExp",
            "regExp" : /^[a-z0-9._\-]+\.[a-z.][a-z.]+$/i
        }],
        "url",
        false
    ), new Input(
        form,
        "NIF",
        [{
            "name" : "placeholder",
            "value" : "00000000T"
        }],
        [{
            "type" : "regExp",
            "regExp" : /^(\d|[x-z])\d{7}[a-hj-np-tv-z]$/i
        }, {
            "type" : "function",
            "function" : "controlDigit"
        }],
        "text",
        false
    ), new Input(
        form,
        "address",
        [{
            "name" : "placeholder",
            "value" : "street, number..."
        }],
        [{
            "type" : "regExp",
            "regExp" : /.*/
        }],
        "text",
        false
    ), new Input(
        form,
        "city",
        [{
            "name" : "placeholder",
            "value" : "my city"
        }],
        [{
            "type" : "regExp",
            "regExp" : /.*/
        }],
        "text",
        false
    ), new Input(
        form,
        "CP",
        [{
            "name" : "placeholder",
            "value" : "12345"
        }],
        [{
            "type" : "regExp",
            "regExp" : /\d{5}/
        }],
        "number",
        false
    ), new Select(
        form,
        "country",
        [],
        [],
        countries
    ), new TextArea(
        form,
        "coments",
        [],
        [],
        false
    ), new Input(
        form,
        "codigo de cliente",
        [{
            "name" : "placeholder",
            "value" : "CC-YYYY-AA"
        }],
        [{
            "type" : "regExp",
            "regExp" : /^[\d]{2}\-[\d]{4}\-[\d]{2}$/
        }, {
            "type" : "function",
            "function" : "controlClient"
        }],
        "text",
        false
    ), new Button(
        form,
        "send",
        [],
        [{
            "type" : "function",
            "function" : "allCorrect"
        }],
        "submit",
        false
    )
];


formElements.forEach(function (formElement) {
    'use strict';
    formElement.addToRoot();
    formElement.addAttributes();
    formElement.addValidationEvents();
});


