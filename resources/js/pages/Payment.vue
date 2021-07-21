<template>
    <div class="container">
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous"
        />
        <!-- FORM CLIENT -->
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="name" class="form-control" id="inputName" />
            </div>
            <div class="col-md-6">
                <label for="inputSurname" class="form-label">Surname</label>
                <input type="Surname" class="form-control" id="inputSurname" />
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" />
            </div>
            <div class="col-6">
                <label for="inputAddress" class="form-label">Address</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputAddress"
                    placeholder="1234 Main St"
                />
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity" />
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip" />
            </div>
            <div class="col-md-4">
                <label for="inputNumber" class="form-label"
                    >Telephone Number</label
                >
                <input type="text" class="form-control" id="inputNumber" />
            </div>
        </form>

        <!-- PAYMENT -->
        <div class="col-6 offset-3 mt-5">
            <div class="card bg-light">
                <div class="card-header">Payment Information</div>
                <div class="card-body">
                    <div class="alert alert-success" v-if="nonce">
                        Successfully generated nonce.
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input
                                    type="number"
                                    id="amount"
                                    class="form-control"
                                    placeholder="Enter Amount"
                                />
                            </div>
                        </div>
                        <hr />
                        <div class="form-group">
                            <label>Credit Card Number</label>
                            <div
                                id="creditCardNumber"
                                class="form-control"
                            ></div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label>Expire Date</label>
                                    <div
                                        id="expireDate"
                                        class="form-control"
                                    ></div>
                                </div>
                                <div class="col-6">
                                    <label>CVV</label>
                                    <div id="cvv" class="form-control"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <button
                class="btn btn-primary btn-block mt-3"
                @click.prevent="payWithCreditCard"
            >
                Pay with Credit Card
            </button>
            <div class="alert alert-danger" v-if="error">
                {{ error }}
            </div>
        </div>
    </div>
</template>

<script>
import braintree from "braintree-web";
export default {
    name: "Payment",
    data() {
        return {
            hostedFieldInstance: false,
            nonce: "",
            error: ""
        };
    },
    methods: {
        payWithCreditCard() {
            if (this.hostedFieldInstance) {
                this.error = "";
                this.nonce = "";
                this.hostedFieldInstance
                    .tokenize()
                    .then(payload => {
                        console.log(payload);
                        this.nonce = payload.nonce;
                    })
                    .catch(err => {
                        console.error(err);
                        this.error = err.message;
                    });
            }
        }
    },
    mounted() {
        braintree.client
            .create({
                authorization: "sandbox_ykgytk45_6mhmdsyyhy26bc24"
            })
            .then(clientInstance => {
                let options = {
                    client: clientInstance,
                    styles: {
                        input: {
                            "font-size": "14px",
                            "font-family": "Open Sans"
                        }
                    },
                    fields: {
                        number: {
                            selector: "#creditCardNumber",
                            placeholder: "Enter Credit Card"
                        },
                        cvv: {
                            selector: "#cvv",
                            placeholder: "Enter CVV"
                        },
                        expirationDate: {
                            selector: "#expireDate",
                            placeholder: "00 / 0000"
                        }
                    }
                };
                return braintree.hostedFields.create(options);
            })
            .then(hostedFieldInstance => {
                // Use hostedFieldInstance to send data to Braintree
                this.hostedFieldInstance = hostedFieldInstance;
            })
            .catch(err => {
                console.error(err);
                this.error = err.message;
            });
    }
};
</script>

<style>
body {
    padding: 5px;
}
</style>
