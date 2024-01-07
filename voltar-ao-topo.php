<div id="VoltarTopo">
    <nav>
        <a href="#containerCabecalho" id="botaoVoltarTopo">Voltar ao Topo<span>&#9650;</span></a>
    </nav>
</div>

<script>
    document.querySelector('#botaoVoltarTopo').addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>