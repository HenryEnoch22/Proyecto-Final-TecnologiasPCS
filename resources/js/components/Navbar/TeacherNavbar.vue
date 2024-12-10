<script setup>
</script>

<template>
    <nav class="nav-bar rounded-1">
        <RouterLink to="/"><img src="/vite.svg" alt="Logo empresa" class="logo"></RouterLink>
        <div class="tabs">
            <div class="tab-item">
                <RouterLink class="nav-link" to="/courses">Cursos</RouterLink>
            </div>
            <div class="tab-item">
                <RouterLink class="nav-link" to="/grades">Calificaciones</RouterLink>
            </div>
            <div class="tab-item">
                <RouterLink class="nav-link" to="/students">Alumnos</RouterLink>
            </div><div class="tab-item">
            <RouterLink class="nav-link" to="/login">Login</RouterLink>
        </div>
        </div>
    </nav>
</template>

<style scoped>
.nav-bar {
    display: flex;
    align-items: center;
    background: #0d6efd;
    color: #fff;
    font-size: 1.2rem;
    padding: 1rem;
    height: 60px;
}

.logo {
    height: 32px;
    margin-right: 2rem;
}

.tabs {
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
    height: 100%;
}

.tab-item {
    height: 60px;
}

.nav-link {
    color: #fff;
    text-decoration: none;
    height: 100%;
    display: flex;
    align-items: center;
    padding: 0 1.5rem;
}

.tab-item:hover {
    background: #2c4f85;
    transition: background-color 0.3s ease;
}

.tab-item:hover .nav-link {
    color: white;
}
</style>
