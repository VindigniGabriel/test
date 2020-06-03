<template>
  <b-navbar toggleable="lg" type="dark" variant="info">
    <b-navbar-brand href="#">
      <img
        src="data:image/jpeg;base64,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"
        alt="Picture"
        width="39"
        height="39"
      />
    </b-navbar-brand>
    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="#">
          <b-icon icon="house" font-scale="1"></b-icon> Demo
        </b-nav-item>
        <b-nav-item href="#">
          <b-icon icon="award" font-scale="1"></b-icon> Link_1
        </b-nav-item>
        <b-nav-item href="#">
          <b-icon icon="folder-symlink" font-scale="1"></b-icon> Link_2
        </b-nav-item>
        <b-nav-item href="#">
          <b-icon icon="building" font-scale="1"></b-icon> Link_3
        </b-nav-item>
        <b-nav-item href="#">
          <b-icon icon="graph-up" font-scale="1"></b-icon> Link_4
        </b-nav-item>
      </b-navbar-nav>

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template v-slot:button-content>
            <em>Gabriel</em>
          </template>
          <b-dropdown-item href="#">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>