document.addEventListener('DOMContentLoaded', function(){
    
    const pathname = window.location.pathname;  //obtener url

    if(pathname.includes('forms/')) //verificar si se esta en la pagina de view o update
    {
        //obtener el elemento que contiene las flechas del paginado y eliminarlas
        let flechasPaginado = document.getElementsByClassName('hidden sm:flex-1 sm:flex sm:items-center sm:justify-between');
        flechasPaginado[0].remove();
    }
});

/*USER TYPES*/

function confirmarBorrado() {
    return confirm('¿Seguro que quieres proceder a eliminar?');
}

/* QUESTIONS */

 //Toggle the menu visibility
 document.getElementById('addElementBtn').addEventListener('click', function(e) {
    e.preventDefault();
    var menu = document.getElementById('elementMenu');
    menu.classList.toggle('show-menu');
});

// Enable response options when selecting 'Caja de texto' or 'Imagen'
function enableResponseOptions() {
    document.getElementById('responseOptions').classList.remove('disabled');
}

// Option selection logic
document.getElementById('selectTextBox').addEventListener('click', function(e) {
    e.preventDefault();
    enableResponseOptions();
    clearResponseOptions(); // Clear previous event listeners
    document.getElementById('responseText').addEventListener('click', function(e) {
        e.preventDefault();
        addFormElement('text', 'text');
    });
    document.getElementById('responseMultipleChoice').addEventListener('click', function(e) {
        e.preventDefault();
        addFormElement('text', 'multipleChoice');
    });
});

document.getElementById('selectHabeasData').addEventListener('click', function(e){
    e.preventDefault();

    let formulario = document.getElementById('formElements');

    habeasInput = document.createElement('input');
    habeasInput.type = 'text';
    habeasInput.name = 'habeas[]';
    habeasInput.className = 'input-box';
    habeasInput.placeholder = 'Habeas Data';

    formulario.appendChild(habeasInput);

});

// document.getElementById('selectImage').addEventListener('click', function(e) {
//     e.preventDefault();
//     enableResponseOptions();
//     clearResponseOptions(); // Clear previous event listeners
//     document.getElementById('responseText').addEventListener('click', function(e) {
//         e.preventDefault();
//         addFormElement('image', 'text');
//     });
//     document.getElementById('responseMultipleChoice').addEventListener('click', function(e) {
//         e.preventDefault();
//         addFormElement('image', 'multipleChoice');
//     });
// });

document.getElementById('titulo').addEventListener('click', function(e) {
    e.preventDefault();
    addFormElement('text');
});

// Function to add a new element pair (Question + Answer)
function addFormElement(questionType, answerType = '') {
    var formElements = document.getElementById('formElements');
    var inputContainer = document.createElement('div');
    inputContainer.className = 'input-container';

    //Se agrega titulo
    if(answerType == '')
    {
        titulo = document.createElement('input');
        titulo.type = 'text';
        titulo.name = 'titulo[]';
        titulo.className = 'input-box';
        titulo.placeholder = 'Agrega titulo';

        var removeBtn = document.createElement('button');
        removeBtn.className = 'remove-btn';
        removeBtn.innerText = 'x';

        // Append both question and answer to the form
        inputContainer.appendChild(titulo);
        inputContainer.appendChild(removeBtn);
        formElements.appendChild(inputContainer);

        removeBtn.addEventListener('click', function() {
            formElements.removeChild(inputContainer);
        });
    }
    else // se agrega pregunta
    {
         // Create a question element (input or image placeholder)
        var questionInput;
        if (questionType === 'text') {
            questionInput = document.createElement('input');
            questionInput.type = 'text';
            questionInput.name = 'que[]';
            questionInput.className = 'input-box';
            questionInput.placeholder = 'Caja de texto';
        } else if (questionType === 'image') {
            questionInput = document.createElement('input');
            questionInput.type = 'file';
            questionInput.className = 'input-box';
            questionInput.accept = 'image/*';  // Para asegurarse de que solo se puedan subir imágenes
        }

        // Create an answer element (text or multiple-choice)
        var answerInput;
        if (answerType === 'text') {
            answerInput = document.createElement('input');
            answerInput.type = 'text';
            answerInput.name = 'quer[]';
            answerInput.value = 'text';
            answerInput.className = 'input-box';
            answerInput.placeholder = 'Respuesta de texto';
            answerInput.readOnly = 'true';
        } else if (answerType === 'multipleChoice') {
            answerInput = document.createElement('select');
            answerInput.className = 'input-box';
            answerInput.name = 'quer[]';
            answerInput.value = 'Si';
            answerInput.innerHTML = '<option value="Si" selected>Si</option><option value="No">No</option>';
            answerInput.disabled = 'true';

            let answerInput2 = document.createElement('input');
            answerInput2.type = 'hidden';
            answerInput2.name = 'quer[]';
            answerInput2.value = 'select';

            inputContainer.appendChild(answerInput2);
        }

        var removeBtn = document.createElement('button');
        removeBtn.className = 'remove-btn';
        removeBtn.innerText = 'x';

        // Append both question and answer to the form
        inputContainer.appendChild(questionInput);
        inputContainer.appendChild(answerInput);
        inputContainer.appendChild(removeBtn);
        formElements.appendChild(inputContainer);

        removeBtn.addEventListener('click', function() {
            formElements.removeChild(inputContainer);
        });
    }
}

// Function to clear previous event listeners
function clearResponseOptions() {
    var newResponseText = document.getElementById('responseText').cloneNode(true);
    var newResponseMultipleChoice = document.getElementById('responseMultipleChoice').cloneNode(true);
    document.getElementById('responseText').replaceWith(newResponseText);
    document.getElementById('responseMultipleChoice').replaceWith(newResponseMultipleChoice);
}

// Confirm form creation or deletion
// function confirmCreateForm() {
//     if (confirm("¿Seguro que desea crear el formulario?")) {
//         alert("Formulario creado con éxito");
//     }
// }

document.getElementById('borrarForm').addEventListener('click', function(e){

    e.preventDefault();

    if (confirm("¿Seguro que desea borrar el formulario?")) {
        document.getElementById('formElements').innerHTML = ''; // Clears the form
        alert("Formulario borrado con éxito");
    }

});

// Event listeners for buttons
document.getElementById('responseCheckbox').addEventListener('click', function(e) {

    e.preventDefault();

    const formElements = document.getElementById('formElements');

    let label1 = document.createElement('label');
    label1.innerHTML = 'Question:';

    let input1 = document.createElement('input');
    input1.type = 'text';
    input1.id = 'checkbox-question';
    input1.name = 'checkboxQuestion';
    input1.className = 'form-control';
    input1.placeholder = 'Write your question here';
    input1.required = 'required';

    let label2 = document.createElement('label');
    label2.innerHTML = 'Checkbox Options:';
    label2.className = 'mt-2';

    let div1 = document.createElement('div');
    div1.id = 'checkbox-list';

    let div2 = document.createElement('div');
    div2.className = 'input-group mb-2 checkbox-item';

    let input2 = document.createElement('input');
    input2.type = 'text';
    input2.name = 'checkboxes[]';
    input2.className = 'form-control';
    input2.placeholder = 'Option 1';
    input2.required = 'required';

    let button1 = document.createElement('button');
    button1.type = 'button';
    button1.className = 'btn btn-secondary';
    button1.innerHTML = '+';
    button1.addEventListener('click', function(event) {
        const boton = event.target;
        const container = boton.parentElement.parentElement;
        const index = container.children.length + 1;
        const newCheckbox = document.createElement('div');
        newCheckbox.classList.add('input-group', 'mb-2', 'checkbox-item');
        newCheckbox.innerHTML = `
            <input type="text" name="checkboxes[]" class="form-control" placeholder="Option ${index}" required>
            <button class="btn btn-secondary" type="button" onclick="addCheckbox(this)">+</button>
            <button class="btn btn-danger" type="button" onclick="removeCheckbox(this)">x</button>
        `;
        container.appendChild(newCheckbox);
    });

    let button2 = document.createElement('button');
    button2.type = 'button';
    button2.className = 'btn btn-danger';
    button2.innerHTML = 'x';
    button2.addEventListener('click', function(event) {
        const boton = event.target;
        const container = boton.parentNode;
        container.remove(); // Remove the specific checkbox container

        //elimianar pregunta si no hay mas opciones
        let contenedor = document.getElementById('checkbox-list');
        if(contenedor.children.length == 0)
        {
            contenedor.previousSibling.remove();
            contenedor.previousSibling.remove();
            contenedor.previousSibling.remove();
        }
    });

    div2.appendChild(input2);
    div2.appendChild(button1);
    div2.appendChild(button2);

    div1.appendChild(div2);
    
    formElements.appendChild(label1);
    formElements.appendChild(input1);
    formElements.appendChild(label2);
    formElements.appendChild(div1);
});

function addCheckbox(boton) {
    const container = boton.parentElement.parentElement;
    const index = container.children.length + 1;
    const newCheckbox = document.createElement('div');
    newCheckbox.classList.add('input-group', 'mb-2', 'checkbox-item');
    newCheckbox.innerHTML = `
        <input type="text" name="checkboxes[]" class="form-control" placeholder="Option ${index}" required>
        <button class="btn btn-secondary" type="button" onclick="addCheckbox(this)">+</button>
        <button class="btn btn-danger" type="button" onclick="removeCheckbox(this)">x</button>
    `;
    container.appendChild(newCheckbox);
}

function removeCheckbox(button) {
    const container = button.parentNode;
    container.remove(); // Remove the specific checkbox container
}
