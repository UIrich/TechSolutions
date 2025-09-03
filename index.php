<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSolutions - Desenvolvimento de Software Confiável</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header role="banner">
        <div class="container header-content">
            <div class="logo" aria-label="Logotipo da TechSolutions">
                <i class="fas fa-laptop-code" aria-hidden="true"></i>
                <span>TechSolutions</span>
            </div>
            <nav role="navigation" aria-label="Menu principal">
                <a href="#sobre">Sobre</a>
                <a href="#servicos">Serviços</a>
                <a href="#depoimentos">Clientes</a>
                <a href="#contato">Contato</a>
                <a href="login.html" class="btn">Área Restrita</a>
            </nav>
        </div>
    </header>

    <main id="main-content">
        <section class="hero" aria-labelledby="hero-heading">
            <div class="container">
                <h1 id="hero-heading">Soluções Tecnológicas que <span>Impulsionam Negócios</span></h1>
                <p class="destaque">"Transformamos desafios complexos em soluções digitais eficientes"</p>
                <a href="#contato" class="btn">Solicitar Orçamento</a>
            </div>
        </section>

        <section id="sobre" class="container" aria-labelledby="sobre-heading">
            <h2 id="sobre-heading">Nossa Expertise</h2>
            <p class="lead">Com 8 anos de mercado, a TechSolutions já entregou mais de 120 projetos de sucesso para clientes em 5 países.</p>
            <div class="destaque-box" role="quote">
                <p>"A TechSolutions revolucionou nossa operação com um sistema que reduziu custos em 35%"</p>
                <small>- Carlos Silva, Diretor da Futurio</small>
            </div>
        </section>

        <section id="servicos" class="bg-cinza" aria-labelledby="servicos-heading">
            <div class="container">
                <h2 id="servicos-heading">Nossas Soluções</h2>
                <div class="servicos">
                    <div class="servico" role="region" aria-labelledby="servico-web">
                        <i class="fas fa-globe" aria-hidden="true"></i>
                        <h3 id="servico-web">Sistemas Web</h3>
                        <p>Soluções completas para gestão empresarial com tecnologia de ponta</p>
                    </div>

                    <div class="servico" role="region" aria-labelledby="servico-mobile">
                        <i class="fas fa-mobile-alt" aria-hidden="true"></i>
                        <h3 id="servico-mobile">Aplicativos Mobile</h3>
                        <p>Desenvolvimento nativo e híbrido para iOS e Android</p>
                    </div>

                    <div class="servico" role="region" aria-labelledby="servico-consultoria">
                        <i class="fas fa-server" aria-hidden="true"></i>
                        <h3 id="servico-consultoria">Consultoria TI</h3>
                        <p>Otimização de processos e infraestrutura tecnológica</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="depoimentos" class="container" aria-labelledby="depoimentos-heading">
            <h2 id="depoimentos-heading">Confiança de Quem Usa</h2>
            <div class="depoimentos">
                <div class="depoimento" role="article">
                    <p>"O sistema desenvolvido superou nossas expectativas e hoje é essencial para nossa operação."</p>
                    <div class="cliente">
                        <strong>Ana Paula</strong>
                        <span>CEO da Zyvio</span>
                    </div>
                </div>

                <div class="depoimento" role="article">
                    <p>"Profissionalismo e expertise técnica que fazem a diferença no mercado."</p>
                    <div class="cliente">
                        <strong>Roberto Costa</strong>
                        <span>Diretor de TI</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="contato" class="bg-cinza" aria-labelledby="contato-heading">
            <div class="container">
                <h2 id="contato-heading">Pronto para Transformar seu Negócio?</h2>
       <form id="form-nova-mensagem" aria-label="Formulário para adicionar nova mensagem">
            <input type="text" id="mensagem-nome" name="nome" placeholder="Nome..." required>
            <input type="email" id="mensagem-email" name="email" placeholder="E-mail..." required>
            <input type="tel" id="mensagem-telefone" name="telefone" placeholder="Telefone..." required>
            
            <select id="mensagem-servico" name="servico" required>
                <option value="">Selecione um serviço</option>
                <option value="Sistema Web">Sistema Web</option>
                <option value="Aplicativo Mobile">Aplicativo Mobile</option>
                <option value="Consultoria">Consultoria</option>
                <option value="Outro">Outro</option>
            </select>

            <textarea id="mensagem-texto" name="mensagem" placeholder="Digite a mensagem..." required></textarea>

            <button type="submit" class="btn">Enviar Mensagem</button>
        </form>

    </div>
</section>
    </main>

    <footer role="contentinfo">
        <div class="container">
            <div class="footer-info">
                <div class="logo" aria-label="Logotipo da TechSolutions">
                    <i class="fas fa-laptop-code" aria-hidden="true"></i>
                    <span>TechSolutions</span>
                </div>
                <p>Transformando ideias em realidade digital desde 2005.</p>
            </div>

            <div class="footer-contato">
                <h3>Contato</h3>
                <p><i class="fas fa-phone" aria-hidden="true"></i> (16) 99110-3386</p>
                <p><i class="fas fa-envelope" aria-hidden="true"></i> contato@techsolutions.com.br</p>
            </div>

                <p>&copy; 2025 TechSolutions. Todos os direitos reservados.</p>
        </div>
        </div>

    </footer>
    <script src="js/script-mensagem.js"></script>
</body>
</html>