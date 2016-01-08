//------------------------ Generic element of a form ------------------------

// Constructor and attributes -----------------------------------------------
function FormElement(root, tag, name, attributes, validationConditions, required) {
    'use strict';
    attributes.unshift({
        "name" : "name",
        "value" : name
    });

    this.root = root;
    this.tag = tag;
    this.attributes = attributes;
    this.validationConditions = validationConditions;
    this.contentLabel = name.charAt(0).toUpperCase() + name.slice(1) + ":";
    this.domElement = null;
    this.label = null;

    if (required) {
        this.contentLabel = "*" + this.contentLabel;
        this.attributes.unshift({
            "name" : "required",
            "value" : required
        });
    }
}

// Methods --------------------------------------------------------------------
FormElement.prototype.addToRoot = function () {
    'use strict';
    var root,
        br1,
        br2,
        br3;

    root = this.root;
    this.label = document.createElement("label");
    this.domElement = document.createElement(this.tag);
    br1 = document.createElement("br");
    br2 = document.createElement("br");
    br3 = document.createElement("br");
    this.label.textContent = this.contentLabel;
    root.appendChild(this.label);
    root.appendChild(br1);
    root.appendChild(this.domElement);
    root.appendChild(br2);
    root.appendChild(br3);
};

FormElement.prototype.addAttributes = function () {
    'use strict';
    var attributes,
        element;

    attributes = this.attributes;
    element = this.domElement;
    if (attributes) {
        attributes.forEach(function (attribute) {
            var name,
                value;

            name = attribute.name;
            value = attribute.value;

            element.setAttribute(name, value);
        });
    }
};

FormElement.prototype.addValidationEvents = function () {
    'use strict';
    var element,
        validations,
        type,
        syntax,
        compareWith,
        functionName;

    // Closures
    function clearClass() {
        element.className = "";
    }
    function changeClass(meetCondition) {
        if (meetCondition) {
            element.className = "valid";
        } else {
            element.className = "invalid";
        }
    }

    function isValidSintax(syntax) {
        var value,
            meetCondition;

        clearClass();
        value = element.value;
        if (value) {
            meetCondition = syntax.test(value);
            changeClass(meetCondition);
        }
    }

    function isConfirm(compareWith) {
        var value,
            compareValue,
            meetCondition;

        value = element.value;
        if (value) {
            compareValue = document.getElementsByName(compareWith)[0].value;
            meetCondition = value == compareValue;
            changeClass(meetCondition);
        }
    }

    function isCorrectDate() {
        var value,
            day,
            month,
            year,
            dateOfBirth,
            currenDate,
            meetCondition;

        value = element.value;
        if (value) {
            day = value.substr(8, 2);
            month = value.substr(5, 2);
            year = value.substr(0, 4);
            dateOfBirth = new Date(year, month, day);
            currenDate = new Date();
            meetCondition = (day == dateOfBirth.getDate()) && (currenDate > dateOfBirth);
            changeClass(meetCondition);
        }
    }

    function isCorectControlDigit() {
        var value,
            numberForTesting,
            controlDigits,
            meetCondition;

        value = element.value;
        controlDigits =
                ["t", "r", "w", "a", "g", "m", "y", "f", "p", "d", "x", "b",
                     "n", "j", "z", "s", "q", "v", "h", "l", "c", "k", "e"];
        numberForTesting = value.substr(0, 8);

        if (value) {
            meetCondition = controlDigits[numberForTesting % 23] == value[8];
            changeClass(meetCondition);
        }
    }
	
	function isCorrectClientCode () {
		var value,
			ccTry,
			aaTry,
			ccReal,
			aaReal,
			currentYear,
			meetCondition;
		
		value = element.value;
		currentYear = new Date().getFullYear().toString();
		if (value) {
			ccTry = value.substr(0,2);
			aaTry = value.substr(8,2);
			ccReal = document.getElementsByName("CP")[0].value.substr(0,2);
			aaReal = currentYear.substr(2,2);
			meetCondition = (ccTry == ccReal) && (aaTry == aaReal);
			changeClass(meetCondition);
		}
	}

    function isAllCorrect(event) {
        var form,
            invalidFields,
            message;

        form = document.forms.newUser;
        invalidFields = document.getElementsByClassName("invalid");
        if (invalidFields.length != 0) {
            message = document.createElement("p");
            message.textContent = "Hay campos incorrectos, por favor, revise el formulario";
            form.appendChild(message);
            event.preventDefault();
        }
    }

    element = this.domElement;
    validations = this.validationConditions;
    validations.forEach(function (validation) {
        type = validation.type;

        switch (type) {
        case "regExp":
            syntax = validation.regExp;
            element.addEventListener('input', function () {
                isValidSintax(syntax);
            }, false);
            break;
        case "confirm":
            compareWith = validation.with;
            element.addEventListener('input', function () {
                isConfirm(compareWith);
            }, false);
            break;
        case "function":
            functionName = validation.function;
            switch (functionName) {
            case "correctDate":
                element.addEventListener('input', isCorrectDate, false);
                break;
            case "controlNif":
                element.addEventListener('input', isCorectControlDigit, false);
                break;
			case "controlClient":
                element.addEventListener('input', isCorrectClientCode, false);
                break;
            case "allCorrect":
                element.addEventListener('click', isAllCorrect, false);
                break;
            }
            break;
        }
    });
};


//------------------------------- Input element -------------------------------

// Constructor and attributes -------------------------------------------------
function Input(root, name, attributes, validationConditions, type, required) {
    'use strict';
    var tag = "input";
    attributes.unshift({
        "name" : "type",
        "value" : type
    });

    FormElement.call(this, root, tag, name, attributes, validationConditions, required);
}

// Hierachy
Input.prototype = Object.create(FormElement.prototype);



//----------------------------- CheckBox element ------------------------------
// An input element with type "check"

// Constructor and attributes -------------------------------------------------
function CheckBox(root, name, attributes, validationConditions, contentLabel, required) {
    'use strict';
    var type = "checkbox";

    Input.call(this, root, name, attributes, validationConditions, type, required);
    // Overwrited attributes
    this.contentLabel = contentLabel;
}

// Hierachy -------------------------------------------------------------------
CheckBox.prototype = Object.create(Input.prototype);

// Overwrited Methods ---------------------------------------------------------
CheckBox.prototype.addToRoot = function () {
    'use strict';
    var root,
        br1,
        br2;

    root = this.root;
    this.label = document.createElement("label");
    this.domElement = document.createElement(this.tag);
    br1 = document.createElement("br");
    br2 = document.createElement("br");
    this.label.textContent = this.contentLabel;
    root.appendChild(this.domElement);
    root.appendChild(this.label);
    root.appendChild(br1);
    root.appendChild(br2);
};


//---------------------------- RadioButton element ----------------------------
// An input element with type "radio"

// Constructor and attributes -------------------------------------------------
function RadioButton(root, name, attributes, validationConditions, value, required) {
    'use strict';
    var type = "radio";
    attributes.unshift({
        "name" : "value",
        "value" : value
    });

    Input.call(this, root, name, attributes, validationConditions, type, required);
    // Overwrited attributes
    this.contentLabel = value.charAt(0).toUpperCase() + value.slice(1);
}

// Hierachy -------------------------------------------------------------------
RadioButton.prototype = Object.create(Input.prototype);


//---------------------------- RadioGroup element -----------------------------
// A group of RadioButtons with the same name

// Constructor and attributes -------------------------------------------------
function RadioGroup(root, name, attributes, validationConditions, values, required) {
    'use strict';
    var tag = null;

    FormElement.call(this, root, tag, name, attributes, validationConditions, required);
    this.values = values;
    this.radioButtons = [];
    this.groupName = name;
}

// Hierachy
RadioGroup.prototype = Object.create(FormElement.prototype);

// Overwrited Methods ---------------------------------------------------------
RadioGroup.prototype.addToRoot = function () {
    'use strict';
    var root,
        name,
        attributes,
        validationConditions,
        values,
        required,
        radioButtons,
        radioButton,
        br1,
        br2,
        br3;

    root = this.root;
    name = this.groupName;
    attributes = this.attributes;
    validationConditions = this.validationConditions;
    values = this.values;
    required = this.required;
    radioButtons = this.radioButtons;

    this.label = document.createElement("label");
    root.appendChild(this.label);
    this.label.textContent = this.contentLabel;
    br1 = document.createElement("br");
    root.appendChild(br1);

    values.forEach(function (value) {
        radioButton = new RadioButton(
            root, name, attributes, validationConditions, value, required);
        radioButtons.push(radioButton);
        radioButton.domElement = document.createElement(radioButton.tag);
        radioButton.label = document.createElement("label");
        radioButton.label.textContent = radioButton.contentLabel;
        root.appendChild(radioButton.domElement);
        root.appendChild(radioButton.label);
    });

    br3 = document.createElement("br");
    br2 = document.createElement("br");
    root.appendChild(br2);
    root.appendChild(br3);
};

RadioGroup.prototype.addAttributes = function () {
    'use strict';
    var radioButtons;

    radioButtons = this.radioButtons;
    radioButtons.forEach(function (radioButton) {
        radioButton.addAttributes();
    });
};

RadioGroup.prototype.addValidationEvents = function () {
    'use strict';
    var radioButtons;

    radioButtons = this.radioButtons;
    radioButtons.forEach(function (radioButton) {
        radioButton.addValidationEvents();
    });
};


//------------------------------ Option element -------------------------------

// Constructor and attributes -------------------------------------------------
function Option(root, name, attributes, validationConditions, value, required) {
    'use strict';
    var tag;
    tag = "option";
    attributes.unshift({
        "name" : "value",
        "value" : value
    });

    FormElement.call(this, root, tag, name, attributes, validationConditions, required);
    this.content = value;
}

// Hierachy
Option.prototype = Object.create(FormElement.prototype);


//---------------------------- Select element -----------------------------

// Constructor and attributes -------------------------------------------------
function Select(root, name, attributes, validationConditions, optionsValues, required) {
    'use strict';
    var tag;
    tag = "select";

    FormElement.call(this, root, tag, name, attributes, validationConditions, required);
    this.optionsValues = optionsValues;
    this.options = [];
}

// Hierachy
Select.prototype = Object.create(FormElement.prototype);

// Overwrited Methods ---------------------------------------------------------
Select.prototype.addToRoot = function () {
    'use strict';
    var root,
        optionsRoot,
        optionsValues,
        required,
        option,
        options,
        br1,
        br2,
        br3;

    root = this.root;
    this.label = document.createElement("label");
    this.label.textContent = this.contentLabel;
    root.appendChild(this.label);
    br1 = document.createElement("br");
    root.appendChild(br1);
    this.domElement = document.createElement(this.tag);
    root.appendChild(this.domElement);

    optionsRoot = this.domElement;
    required = this.required;
    options = this.options;

    optionsValues = this.optionsValues;
    optionsValues.forEach(function (optionValue) {
        option = new Option(optionsRoot, optionValue, [], [], optionValue, required);
        options.push(option);
        option.domElement = document.createElement(option.tag);
        option.domElement.textContent = option.content;
        optionsRoot.appendChild(option.domElement);
    });
    br2 = document.createElement("br");
    br3 = document.createElement("br");
    root.appendChild(br2);
    root.appendChild(br3);
};

Select.prototype.addAttributes = function () {
    'use strict';
    var options;

    options = this.options;
    options.forEach(function (option) {
        option.addAttributes();
    });
};

Select.prototype.addValidationEvents = function () {
    'use strict';
    var options;

    options = this.options;
    options.forEach(function (option) {
        option.addValidationEvents();
    });
};


//----------------------------- TextArea element ------------------------------

// Constructor and attributes -------------------------------------------------
function TextArea(root, name, attributes, validationConditions, required) {
    'use strict';
    var tag;
    tag = "textarea";

    FormElement.call(this, root, tag, name, attributes, validationConditions, required);
}

// Hierachy
TextArea.prototype = Object.create(FormElement.prototype);



//------------------------------ Button element -------------------------------

// Constructor and attributes -------------------------------------------------
function Button(root, name, attributes, validationConditions, type, required) {
    'use strict';
    var tag;
    tag = "button";
    attributes.unshift({
        "name" : "type",
        "value" : type
    });

    FormElement.call(this, root, tag, name, attributes, validationConditions, required);
    this.content = name.charAt(0).toUpperCase() + name.slice(1);
}

// Hierachy
Button.prototype = Object.create(FormElement.prototype);

// Overwrited Methods ---------------------------------------------------------
Button.prototype.addToRoot = function () {
    'use strict';
    var root;

    root = this.root;
    this.domElement = document.createElement(this.tag);
    this.domElement.textContent = this.content;
    root.appendChild(this.domElement);
};
