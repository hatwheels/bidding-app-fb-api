<template>
  <div
    v-click-outside="hideMenu"
    class="h-full z-40"
  >
    <div
      ref="userMenu"
      class="flex h-full cursor-pointer"
      @click="toggleMenu"
    >
      <div class="rounded-full shadow overflow-hidden w-10 h-10 my-auto mx-2">
        <img
          :src="avatar"
          alt="user avatar"
        >
      </div>
    </div>

    <div
        ref="dropdown"
        class="w-1/5 shadow-md"
    >
    <div class="bg-white" :class="{ hidden }">
        <slot name="menu-items" />
    </div>
    </div>
  </div>
</template>

<script>

import Popper from 'popper.js'

export default {
  props: {
    avatar: {
      type: String,
      default: '',
    },
    name: {
      type: String,
      default: 'User',
    },
  },
  data () {
    return {
      popper: undefined,
      hidden: true,
    }
  },
  mounted () {
    this.popper = new Popper(this.$refs.userMenu, this.$refs.dropdown, {
      placement: 'bottom-end',
      modifiers: {
          offset: {
            enabled: true,
            offset: "0, 10",
          },
          keepTogether: {
            enabled: false
        },
      },
    })

    this.$nextTick(this.popper.scheduleUpdate)
  },
  methods: {
    hideMenu () {
      this.hidden = true
    },
    toggleMenu () {
      this.hidden = !this.hidden
      if (this.popper) {
        this.popper.scheduleUpdate();
      }
    },
  },
}

</script>

