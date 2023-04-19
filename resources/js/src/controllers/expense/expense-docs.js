import {getElementNumber} from '../../helpers';

const ExpsenDocs = function() {
    let doc_container_count = 0;

    function form_html(id_number) {
        return `<div class="expense_doc_container grid gap-4 sm:grid-cols-2 sm:gap-6 mb-4">
            <div class="">
            <label for="doc_name_${id_number}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload file</label>
            <input id="doc_name_${id_number}" name="expense_docs[${id_number}][doc_name]" class="expense_doc block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PDF, PNG, JPG or GIF (MAX. 800x400px).</p>
            </div>
            <div class="">
            <label for="doc_label_${id_number}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Doc Label</label>
            <input name="expense_docs[${id_number}][doc_label]" id="doc_label_${id_number}" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Doc Label" required="">
            </div>
        </div>`;
    }

    function registerEvents() {
        doc_container_count = $(".expense_doc_container").length;

        $(document).on("click", "#add_more_file", function() {
            doc_container_count += 1;
            $("#expense_docs_container").append(form_html(doc_container_count))
        });

        $(document).on("change", ".expense_doc", function() {
            if (
                typeof $(this)[0] !== 'undefined' && 
                typeof $(this)[0].files !== 'undefined' && 
                typeof $(this)[0].files[0] !== 'undefined' 
            ) {
                const file = $(this)[0].files[0];
                const ElementNumber = getElementNumber($(this).attr('id'))
                var reader = new FileReader();
                reader.onload = function(e) {
                  // Get the file name
                  $("#doc_label_"+ElementNumber).val(file.name)
                };
                reader.readAsText(file);
            }
        });
    }
    function initalize() {
        registerEvents();
    }

    return {
        initalize
    }
};


export default ExpsenDocs;