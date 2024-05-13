<?php

    function estiloMensagem() {

        echo "

            <style>
                body {
                    font-family: arial;
                }
                .erro {
                    padding: 10px 40px;
                    position: fixed;
                    bottom: 50px;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background: #ffebeb;
                    border-radius: 5px;
                    color: #ff5353;
                    font-size: 12px;
                    font-weight: bold;
                    text-align: center;
                    z-index:2;
                }
                .acao {
                    padding: 20px;
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    box-shadow: 0 0 .3em #cdcdcd;
                    border-radius: 5px;
                    background: #c7ffc7;
                }
            </style>

        ";

    }