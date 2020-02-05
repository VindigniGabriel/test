<template>
  <b-navbar toggleable="lg" type="dark" variant="info">
    <b-navbar-brand href="#">
      <img
        src="https://www.agence.com.br/wp-content/themes/dt-the7/inc/presets/images/agence/agence.png"
        alt="Kitten"
        width="137"
        height="39"
      />
    </b-navbar-brand>
    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="#">
          <b-icon icon="house" font-scale="1"></b-icon> Agence
        </b-nav-item>
        <b-nav-item href="#">
          <b-icon icon="award" font-scale="1"></b-icon> Projetos
        </b-nav-item>
        <b-nav-item href="#">
          <b-icon icon="folder-symlink" font-scale="1"></b-icon> Administrativo
        </b-nav-item>
        <b-nav-item href="#">
          <b-icon icon="building" font-scale="1"></b-icon> Comercial
        </b-nav-item>
        <b-nav-item href="#">
          <b-icon icon="graph-up" font-scale="1"></b-icon> Financeiro
        </b-nav-item>
      </b-navbar-nav>

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template v-slot:button-content>
            <em>Usuário</em>
          </template>
          <b-dropdown-item href="#">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>