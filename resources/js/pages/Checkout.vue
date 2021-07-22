<template>
    <div>
      <h1>Cassa</h1>
      <div class="cart">
        <h2>Il tuo Carrello</h2>
        <div v-if="Object.keys(cart).length" >
            <div v-for="(item, index) in cart" :key="index">
                <button  @click="remove(item.name, item.unitPrice)">-</button>
                <input class="inputNum" type="number" min="1" v-model="item.quantità" @change="updateQuantity($event, item.name, item.unitPrice)">
                <button @click="add(item.name, item.unitPrice)">+</button>
                <span class="name">{{item.name}}</span>
                <span>€ {{item.price.toFixed(2)}}</span> 
                <span class="remove" @click="removeAll(item.name, item.price)">X</span>

            </div>
        </div>
        <div v-else>Il carrello è vuoto</div>
        <h3>Tot: €{{tot.toFixed(2)}}</h3>
        <button @click="deleteCart()">Elimina Carrello</button>
    </div>
      <div class="container">
        <div class="col-6 offset-3">

            <div class="card bg-light">
                <form>
                <div class="mb-3">
                    <label for="customer_name" class="control-table">Nome*</label>
                    <input type="text" name="customer_name" class="form-control" id="customer_name" value="" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="customer_last_name" class="control-table">Cognome*</label>
                    <input type="text" name="customer_last_name" class="form-control" id="customer_last_name" value="" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="customer_email" class="control-table">Email*</label>
                    <input type="text" name="customer_email" class="form-control" id="customer_email" value="" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="customer_phone" class="control-table">Numero di Telefono*</label>
                    <input id="customer_phone" type="text" class="form-control" name="customer_phone" value="" required autocomplete="address" maxlength="50" autofocus>
                </div>
                <div class="mb-3">
                    <label for="customer_address" class="control-table">Indirizzo*</label>
                    <input id="customer_address" type="text" class="form-control" name="customer_address" value="" required autocomplete="vat_number" minlength="11" maxlength="11" autofocus>
                </div>
                <button type="submit" class="btn btn-primary  btn-block mb-3">Sign in</button>
            </form>
            </div>

            <div class="card bg-light">
                <div class="card-header">Payment Information</div>
                <div class="card-body">
                    <div class="alert alert-success" v-if="nonce">
                        Successfully generated nonce.
                    </div>
                    <form>
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
                class="btn btn-primary btn-block"
                @click.prevent="payWithCreditCard"
            >
                Pay with Credit Card
            </button>
            <div class="alert alert-danger" v-if="error">
                {{ error }}
            </div>
        </div>
    </div>

  </div>
</template>

<script>
import braintree from "braintree-web";

export default {
    name: 'CheckOut',
    data() {
        return {
          tot: 0,
          cart: [],
            hostedFieldInstance: false,
            nonce: "",
            error: ""
        }
    },
    created(){
        this.getBill();
    },
     mounted() {
        braintree.client
            .create({
                authorization: "sandbox_4xzwt3mg_6mhmdsyyhy26bc24"
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
    },
    methods: {
        getBill(){
            if(window.localStorage.getItem('cart')){
                this.cart = JSON.parse(window.localStorage.getItem('cart'));

                for(let item in this.cart){
                    this.tot+=this.cart[item].price;

                };
            }
        },
        add(name, unit){
            this.cart[name].quantità ++;
            this.cart[name].price += unit;
            this.tot += unit;
            this.store();
        },
        remove(name, unit){
            if(this.cart[name].quantità == 1){
                delete this.cart[name];
            } else {
                this.cart[name].quantità --;
                this.cart[name].price -= unit;
            }
            this.tot -= unit;
            this.store();
        },
        removeAll(item, price){
            console.log(item);
            console.log(price);
            delete this.cart[item];
            this.tot -= price;
            this.store();
        },
        updateQuantity(e,name, unit){
            const value = parseFloat(e.target.value);
            if(value>0){
                console.log(value);
                this.cart[name].quantità = value;
                this.cart[name].price = (value * unit);
                this.tot = 0;
                this.setTotal();
                this.store();
            } else {
                this.cart[name].quantità = 1;
                this.cart[name].price = unit;
                this.tot = 0;
                this.setTotal();
                this.store();
            }
        },
        setTotal(){
            for(let item in this.cart){
                this.tot+=this.cart[item].price;
            }; 
        },
        store(){
            window.localStorage.setItem('cart', JSON.stringify(this.cart));
        },
        deleteCart(){
            const resp = confirm('Vuoi cancellare il tuo ordine?');
            if(resp){
                this.cart = {};
                this.tot = 0; 
                window.localStorage.clear();
            } 
        },
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
    }    
}
</script>

<style>
body {
    padding: 5px;
}
</style>