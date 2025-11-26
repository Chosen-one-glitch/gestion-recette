<nav class="navbar">
    <div class="nav-left">
        <div class="logo-container">
            <img src="Assets/IMG/Logo.png" alt="logo" class="logo" />
            <span class="app-name">CookingZone</span>
        </div>
    </div>

    <div class="nav-center">
        <input type="text" placeholder="Rechercher une recette..." class="search-bar" />
    </div>

    <div class="nav-right">
        <?php if (!empty($_SESSION['user'])): ?>
            <a href="index.php?page=dashboard" class="btn">Tableau de bord</a>
            <a href="index.php?page=addRecipe" class="btn">Ajouter une recette</a>
            <a href="index.php?page=profile" class="btn">Profil</a>
            <a href="logout.php" class="btn">Déconnexion</a>
        <?php else: ?>
            <a href="index.php?page=accueil" class="btn">Accueil</a>
            <a href="index.php?page=register" class="btn">Sign in</a>
            <a href="index.php?page=login" class="btn btn-outline">Log in</a>
        <?php endif; ?>

        
    </div>
</nav>
