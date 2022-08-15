<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gestionnaire de Planning</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Semainier
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/semainier/generateSemainier">Génération du semainier</a></li>
                        <?php if ($aidepeda->semainier_id) : ?>
                        <li><a class="dropdown-item" href="/semainier/show">Voir le semainier</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Enfant
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/enfant/index">Enfant(s) suivit</a></li>
                        <li><a class="dropdown-item" href="/enfant/create">Ajouter un enfant</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Titulaire
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/titulaire/index">Listing</a></li>
                        <li><a class="dropdown-item" href="/titulaire/create">Ajouter un titulaire</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ecole
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Listing</a></li>
                        <li><a class="dropdown-item" href="#">Ajouter une école</a></li>
                    </ul>
                </li>
                <li class="nav-item d-flex">
                    <a class="nav-link" href="/aidepeda/logout">Se déconnecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>