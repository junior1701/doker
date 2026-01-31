const insertPaymentTermsButton = document.getElementById('insertPaymentTermsButton');
const insertInstallmentButton = document.getElementById('insertInstallmentTerm');
const Action = document.getElementById('acao');

async function insertPaymentTerm() {
    try {
        const response = Action.value === 'c' ?
            await Request.SetForm('form').post('/paymentterms/insert')
            :
            await Request.SetForm('form').post('/paymentterms/update');
        if (!response.status) {
            Swal.fire({
                icon: 'error',
                title: "Restrição",
                text: response.message ,
                timer:2000,
                timerProgressBar:true,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }
        Swal.fire({
            icon: 'success',
            title: 'Sucesso',
            text: response.message,
            timer:2000,
            timerProgressBar:true,
            didOpen: () => {
                Swal.showLoading();
            }
        });


    } catch (error) {
        console.log('Error:', error);
    }
}

insertPaymentTermsButton.addEventListener('click', async () => {
    await insertPaymentTerm();
});
insertInstallmentButton.addEventListener('click', async () => {
    alert('Inserir parcelamento');
});