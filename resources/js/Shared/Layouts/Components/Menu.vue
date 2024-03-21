<template>
    <BContainer fluid>
        <div id="two-column-menu"></div>

        <template v-if="layoutType === 'vertical' || layoutType === 'semibox'">
            <ul class="navbar-nav h-100" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu"> Menu </span>
                </li>
                <li class="nav-item" v-for="(menu,index) in menus.menus" v-bind:key="index">
                    <Link v-if="!menu.main.has_child" class="nav-link menu-link" :href="menu.main.route" :class="{'active': $page.component.startsWith(menu.main.path) }">
                        <i :class="menu.main.icon"></i>
                        <span data-key="krad-dashboards">{{menu.main.name}}</span>
                    </Link>
                  <Link v-else class="nav-link menu-link" :href="'#'+menu.main.name" :class="{'active': $page.component.startsWith(menu.main.path) }" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i :class="menu.main.icon"></i>
                        <span data-key="krad-scholars">{{menu.main.name}}</span>
                    </Link>
                    <div v-if="menu.main.has_child" class="collapse menu-dropdown" :id="menu.main.name">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item" v-for="(sub,index) in menu.submenus" v-bind:key="index">
                                <Link class="nav-link" :class="{'active': $page.url === sub.path }" :href="sub.route">{{sub.name}}</Link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-title">
                    <i class="ri-more-fill"></i>
                    <span data-key="krad-lists"> Directory </span>
                </li>
               <li class="nav-item" v-for="(menu,index) in menus.lists" v-bind:key="index">
                    <Link v-if="!menu.main.has_child" class="nav-link menu-link" :href="menu.main.route" :class="{'active': $page.component.startsWith(menu.main.path) }">
                        <i :class="menu.main.icon"></i>
                        <span data-key="krad-dashboards">{{menu.main.name}}</span>
                    </Link>
                    <Link v-else class="nav-link menu-link" :href="'#'+menu.main.name" :class="{'active': $page.component.startsWith(menu.main.path) }" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i :class="menu.main.icon"></i>
                        <span data-key="krad-scholars">{{menu.main.name}}</span>
                    </Link>
                    <div v-if="menu.main.has_child" class="collapse menu-dropdown" :id="menu.main.name">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item" v-for="(sub,index) in menu.submenus" v-bind:key="index">
                                <Link class="nav-link" :class="{'active': $page.url === sub.path }" :href="sub.route">{{sub.name}}</Link>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </template>
    </BContainer>
</template>
<script>
import { layoutComputed } from "@/Shared/State/helpers";
import simplebar from "simplebar-vue";

export default {
  components: {
    simplebar,
  },
  data() {
    return {
       currentUrl: window.location.origin,
      menus: [],
      settings: {
        minScrollbarLength: 60,
      },
    };
  },
  computed: {
    ...layoutComputed,
    layoutType: {
      get() {
        return this.$store ? this.$store.state.layout.layoutType : {} || {};
      },
    },
  },
  mounted() {
    this.initActiveMenu();
    this.onRoutechange();
    this.fetch();
    if (document.querySelectorAll(".navbar-nav .collapse")) {
      let collapses = document.querySelectorAll(".navbar-nav .collapse");

      collapses.forEach((collapse) => {
        // Hide sibling collapses on `show.bs.collapse`
        collapse.addEventListener("show.bs.collapse", (e) => {
          e.stopPropagation();
          let closestCollapse = collapse.parentElement.closest(".collapse");
          if (closestCollapse) {
            let siblingCollapses =
              closestCollapse.querySelectorAll(".collapse");
            siblingCollapses.forEach((siblingCollapse) => {
              if (siblingCollapse.classList.contains("show")) {
                siblingCollapse.classList.remove("show");
                siblingCollapse.parentElement.firstChild.setAttribute("aria-expanded", "false");
              }
            });
          } else {
            let getSiblings = (elem) => {
              // Setup siblings array and get the first sibling
              let siblings = [];
              let sibling = elem.parentNode.firstChild;
              // Loop through each sibling and push to the array
              while (sibling) {
                if (sibling.nodeType === 1 && sibling !== elem) {
                  siblings.push(sibling);
                }
                sibling = sibling.nextSibling;
              }
              return siblings;
            };
            let siblings = getSiblings(collapse.parentElement);
            siblings.forEach((item) => {
              if (item.childNodes.length > 2) {
                item.firstElementChild.setAttribute("aria-expanded", "false");
                item.firstElementChild.classList.remove("active");
              }
              let ids = item.querySelectorAll("*[id]");
              ids.forEach((item1) => {
                item1.classList.remove("show");
                item1.parentElement.firstChild.setAttribute("aria-expanded", "false");
                item1.parentElement.firstChild.classList.remove("active");
                if (item1.childNodes.length > 2) {
                  let val = item1.querySelectorAll("ul li a");

                  val.forEach((subitem) => {
                    if (subitem.hasAttribute("aria-expanded"))
                      subitem.setAttribute("aria-expanded", "false");
                  });
                }
              });
            });
          }
        });

        // Hide nested collapses on `hide.bs.collapse`
        collapse.addEventListener("hide.bs.collapse", (e) => {
          e.stopPropagation();
          let childCollapses = collapse.querySelectorAll(".collapse");
          childCollapses.forEach((childCollapse) => {
            let childCollapseInstance = childCollapse;
            childCollapseInstance.classList.remove("show");
            childCollapseInstance.parentElement.firstChild.setAttribute("aria-expanded", "false");
          });
        });
      });
    }
  },

  methods: {
    fetch(){
        axios.get(this.currentUrl+'/utility/menus')
        .then(response => {
            this.menus = response.data;
        })
        .catch(err => console.log(err));
    },
    onRoutechange() {
      // this.initActiveMenu();
      setTimeout(() => {
        var currentPath = window.location.pathname;
        if (document.querySelector("#navbar-nav")) {
          let currentPosition = document.querySelector("#navbar-nav").querySelector('[href="' + currentPath + '"]')?.offsetTop;
          if (currentPosition > document.documentElement.clientHeight) {
            document.querySelector("#scrollbar .simplebar-content-wrapper") ? document.querySelector("#scrollbar .simplebar-content-wrapper").scrollTop = currentPosition + 300 : '';
          }
        }
      }, 500);
    },

    initActiveMenu() {
      setTimeout(() => {
        var currentPath = window.location.pathname;
        if (document.querySelector("#navbar-nav")) {
          let a = document.querySelector("#navbar-nav").querySelector('[href="' + currentPath + '"]');
          if (a) {
            a.classList.add("active");
            let parentCollapseDiv = a.closest(".collapse.menu-dropdown");
            if (parentCollapseDiv) {
              parentCollapseDiv.classList.add("show");
              parentCollapseDiv.parentElement.children[0].classList.add("active");
              parentCollapseDiv.parentElement.children[0].setAttribute("aria-expanded", "true");
              if (parentCollapseDiv.parentElement.closest(".collapse.menu-dropdown")) {
                parentCollapseDiv.parentElement.closest(".collapse").classList.add("show");
                if (parentCollapseDiv.parentElement.closest(".collapse").previousElementSibling)
                  parentCollapseDiv.parentElement.closest(".collapse").previousElementSibling.classList.add("active");
                const grandparent = parentCollapseDiv.parentElement.closest(".collapse").previousElementSibling.parentElement.closest(".collapse");
                if (grandparent && grandparent && grandparent.previousElementSibling) {
                  grandparent.previousElementSibling.classList.add("active");
                  grandparent.classList.add("show");
                }
              }
            }
          }
        }
      }, 0);
    },
  },
};
</script>