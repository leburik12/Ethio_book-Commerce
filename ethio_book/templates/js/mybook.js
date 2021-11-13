
// for single Book
let rating_check = document.getElementsByClassName('rt');
rating_check = Array.from(rating_check);
rating_check.forEach(rt => {
    rt.addEventListener("change", (e) => {
        const xhr = new XMLHttpRequest();

        let rate_value = e.target.dataset.rt;
        let book_id = e.target.dataset.id;
        let BASE_URI = 'http://localhost/ethio_book/'
        console.log(BASE_URI);
        xhr.open("GET", `${BASE_URI}/ajax_handler.php?rt=${rate_value}&bid=${book_id}`);
        xhr.responseType = "text";
        xhr.onload = function () {
            const server_response = xhr.response;
            if (server_response) {
                let ui_rate = document.getElementById("rating_real_value");
                ui_rate.innerHTML = parseFloat(server_response).toFixed(1);
            }
        }
        xhr.send();
    })
});

// let total_cost = document.getElementById("total_cost");
// let total_cost_value = 0;

// document.getElementById("new_book_qty").addEventListener('input', (e) => {
//     let nbq_price = "<?php echo $book->new_book_price; ?>";
//     total_cost_value += parseFloat(nbq_price) * e.target.value;

//     total_cost.innerHTML = parseFloat(total_cost_value);
// });
// document.getElementById("old_book_qty").addEventListener('input', (e) => {
//     let obq_price = "<?php echo $book->old_book_price; ?>";
//     total_cost_value += parseFloat(obq_price) * e.target.value;

//     total_cost.innerHTML = parseFloat(total_cost_value);
// });
