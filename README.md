<h3 align="center">Pacientes e Visitas Médicas</h3>
<br>

<p>
O objetivo desse sistema é o de possibilitar a captação envios tanto de JSON como XML para posterior armazenamento das informações no banco de dados.
O sistema foi desenvolvido utilizando containers Docker para facilitar a implantação e foi documentado com o Swagger para melhor entendimento.
<p>

<br><br>

><h3 align="center">Principais Ferramentas Utilizadas</h3>
<br>

<ul>
    <li>Laravel</li>
    <li>Docker</li>
    <li>Containers: MySQL e NGIX Alpine</li>
</ul>
<br><br>

><h3 align="center">Instruções Para Após a Clonagem do Projeto</h3>
<br>

<ul>
    <li>Executar os comandos abaixo:</li>
    <li>composer install</li>
    <li>php artisan key:generate</li>
    <li>docker-compose up -d</li>
</ul>
<br>

><h3 align="center">Requisitos</h3>
<br>

<p>
<b>Para customizar/executar a aplicação é necessário ter os recursos abaixo após a clonagem:</b>
<br><br>
<ul>
    <li><b>PHP 8.0</b></li>
    <li><b>Laravel 10</b></li>
    <li>
        <b>Editor de códigos (Visual Studio Code ou outro como o Android Studio)</b>
        <ul><br>
            <li>Visual Studio Code - Disponível em: https://code.visualstudio.com/download</li>
        </ul>  
    </li>
    <br>
    <li>
        <b>Docker</b>
        <ul><br>
            <li>Disponível em: https://docs.docker.com/</li>
        </ul>  
    </li>
    <br>
</ul>

<p><br>

><h3 align="center">Algumas Capturas do Swagger</h3>
<br>

><b>/documentation</b><br>

![Screenshot](https://github.com/Tarcisio-Souto/wb_fichas_medicas/blob/main/capturas/overview.PNG)

<br><br>

><b>/enviar-json</b><br>

![Screenshot](https://github.com/Tarcisio-Souto/wb_fichas_medicas/blob/main/capturas/postJSON.PNG)

<br><br>

><b>/enviar-xml</b><br>

![Screenshot](https://github.com/Tarcisio-Souto/wb_fichas_medicas/blob/main/capturas/postXML.PNG)

<br><br>

><b>/paciente</b><br>

![Screenshot](https://github.com/Tarcisio-Souto/wb_fichas_medicas/blob/main/capturas/getPacientes.PNG)

<br><br><br>

><p>TSS - Vitória/ES - 2024</p>
