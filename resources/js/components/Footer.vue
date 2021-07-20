<template>
    <footer>
        <div class="tab">
            <div class="tab-card">
                <h5>Scopri deliveroo</h5>
                <a href="/">Investitori</a>
                <a href="/">Chi Siamo</a>
                <a href="/">Ristoranti</a>
                <a href="/">Altro</a>
                <a href="/">Lavora con noi</a>
            </div>
            <div class="tab-card">
                <h5>Note Legali</h5>
                <a href="/">Termini & Condizioni</a>
                <a href="/">Informativa sulla privacy</a>
                <a href="/">Cookies</a>
            </div>
            <div class="tab-card">
                <h5>Aiuto</h5>
                <a href="/">Contatti</a>
                <a href="/">FAQ</a>
                <a href="/">Tipi di cucina</a>
                <a href="/">Mappa del sito</a>
            </div>
            <div class="tab-card">
                <h5>Porta Deliveroo con te</h5>
                <img src="../img/banner.png" alt="" />
            </div>
        </div>
        <div class="foot-bot">
            <div class="social">
                <span><i class="fab fa-facebook"></i></span>
                <span><i class="fab fa-twitter"></i></span>
                <span><i class="fab fa-instagram"></i></span>
            </div>
            <div class="deli">
                <i class="far fa-copyright"></i> 2021 DeliveBoo
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer"
};
</script>

<style scoped lang="scss">
footer {
    background: #2e3333;
    color: #ffff;
    height: 30%;
    margin-top: 10px;

    .tab {
        display: flex;
        margin-top: 5px;
        max-width: 1200px;
        margin: 0 auto;

        .tab-card {
            display: flex;
            flex-direction: column;
            flex-basis: calc(100% / 4 - 20px);
            background: #434848;
            padding: 24px;
            margin: 20px 10px;
            border-radius: 5px;

            a {
                color: #fff;
                text-decoration: none;
                &:hover {
                    color: #00a396;
                }
            }

            img {
                width: 130px;
            }
        }
    }
    .foot-bot {
        display: flex;
        max-width: 1200px;
        margin: 0 auto;
        justify-content: space-between;

        .social {
            font-size: 1.5rem;
            margin-bottom: 15px;

            i {
                margin-right: 10px;
                cursor: pointer;
                transition: 0.3s;
            }
            .fa-facebook:hover {
                color: #1877f2;
            }
            .fa-twitter:hover {
                color: #55acee;
            }
            .fa-instagram:hover {
                color: #f00075;
            }
        }

        .deli {
            color: #828585;
        }
    }
}
</style>
