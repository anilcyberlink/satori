document.addEventListener("DOMContentLoaded", () => {
  /* MOBILE MENU ACCORDIONS */
  const mobileMenuDrawer = document.getElementById("mobile-menu-drawer");
  if (mobileMenuDrawer) {
    const mainAccordions = mobileMenuDrawer.querySelectorAll(
      ".mobile-nav-accordion-toggle",
    );
    mainAccordions.forEach((button) => {
      button.addEventListener("click", function () {
        const content = this.nextElementSibling;
        if (!content) return;
        const isOpen = !content.classList.contains("hidden");
        mainAccordions.forEach((otherButton) => {
          if (otherButton === button) return;
          const otherContent = otherButton.nextElementSibling;
          if (otherContent) {
            otherContent.classList.add("hidden");
          }
          otherButton.classList.remove("is-open");
        });
        if (isOpen) {
          content.classList.add("hidden");
          this.classList.remove("is-open");
        } else {
          content.classList.remove("hidden");
          this.classList.add("is-open");
        }
      });
    });
    const nestedAccordions = mobileMenuDrawer.querySelectorAll(
      ".mobile-nav-nested-toggle",
    );
    nestedAccordions.forEach((button) => {
      button.addEventListener("click", function () {
        const content = this.nextElementSibling;
        if (!content) return;
        const isOpen = !content.classList.contains("hidden");
        const parent = this.closest(".mobile-nav-accordion-content");
        if (parent) {
          parent
            .querySelectorAll(".mobile-nav-nested-toggle")
            .forEach((otherButton) => {
              if (otherButton === button) return;
              const otherContent = otherButton.nextElementSibling;
              if (otherContent) {
                otherContent.classList.add("hidden");
              }
              otherButton.classList.remove("is-open");
            });
        }
        if (isOpen) {
          content.classList.add("hidden");
          this.classList.remove("is-open");
        } else {
          content.classList.remove("hidden");
          this.classList.add("is-open");
        }
      });
    });
  }
  /* MEGA MENU
   - Click toggle
   - Keyboard activation through native click
   - Hover support
   - Mouse leave close
   - Outside click close
   - Escape close
   - Background scroll lock while hovered */
  const megaTriggers = document.querySelectorAll("[data-mega-target]");
  const megaMenus = document.querySelectorAll("[data-mega-menu]");
  const floatingContactWidget = document.getElementById(
    "floating-contact-widget",
  );
  /*MEGA MENU SCROLL LOCK
   Keeps the browser scrollbar visible while preventing
   the background page from scrolling. */
  let megaMenuScrollLocked = false;
  /**
   * Prevent mouse wheel / trackpad scrolling.
   * The scrollbar remains visible because we do NOT change
   * body overflow.
   */
  const preventMegaMenuWheelScroll = (event) => {
    if (!megaMenuScrollLocked) {
      return;
    }
    event.preventDefault();
  };
  /**
   * Prevent keyboard-based page scrolling.
   * These keys normally move the page vertically.
   * Other keyboard interactions remain unaffected.
   */
  const preventMegaMenuKeyboardScroll = (event) => {
    if (!megaMenuScrollLocked) {
      return;
    }
    const scrollKeys = [
      "ArrowUp",
      "ArrowDown",
      "ArrowLeft",
      "ArrowRight",
      "PageUp",
      "PageDown",
      "Home",
      "End",
      " ",
    ];
    if (scrollKeys.includes(event.key)) {
      event.preventDefault();
    }
  };
  /** Prevent touch-based page scrolling.*/
  const preventMegaMenuTouchScroll = (event) => {
    if (!megaMenuScrollLocked) {
      return;
    }
    event.preventDefault();
  };
  /** Lock background page scrolling without hiding the browser scrollbar.*/
  const lockPageScroll = () => {
    megaMenuScrollLocked = true;
  };
  /**Restore normal page scrolling.*/
  const unlockPageScroll = () => {
    megaMenuScrollLocked = false;
  };
  /* Use non-passive listeners because preventDefault() must be allowed to stop the scrolling action.*/
  window.addEventListener("wheel", preventMegaMenuWheelScroll, {
    passive: false,
  });
  window.addEventListener("touchmove", preventMegaMenuTouchScroll, {
    passive: false,
  });
  window.addEventListener("keydown", preventMegaMenuKeyboardScroll);
  /* CLOSE ALL MEGA MENUS */
  const closeAllMegaMenus = () => {
    megaMenus.forEach((menu) => {
      menu.classList.remove("open");
    });
    megaTriggers.forEach((trigger) => {
      trigger.classList.remove("active");
    });
    /* Always restore normal page scrolling when all mega menus are closed.*/
    unlockPageScroll();
  };
  /* GET MEGA MENU */
  const getMegaMenu = (trigger) => {
    const targetId = trigger?.getAttribute("data-mega-target");
    if (!targetId) {
      return null;
    }
    return document.querySelector(`[data-mega-menu="${CSS.escape(targetId)}"]`);
  };
  /* NAVBAR SCROLL STATE */
  const handleNavbarScroll = () => {
    const isScrolled = window.scrollY > 0;
    document.documentElement.classList.toggle("nav-scrolled", isScrolled);
    floatingContactWidget?.classList.toggle("is-centered", isScrolled);
  };
  window.addEventListener("scroll", handleNavbarScroll, {
    passive: true,
  });
  handleNavbarScroll();
  /* MEGA MENU CLICK / KEYBOARD ACTIVATION */
  megaTriggers.forEach((trigger) => {
    trigger.addEventListener("click", (event) => {
      event.stopPropagation();
      const targetMenu = getMegaMenu(trigger);
      if (!targetMenu) {
        return;
      }
      const isOpen = targetMenu.classList.contains("open");
      /*
       * Close every menu first.
       * This also restores scrolling if another menu
       * was previously opened through hover.
       */
      closeAllMegaMenus();
      /*
       * Toggle the selected menu.
       * Keyboard activation uses the same native click
       * behavior, so keyboard functionality remains unchanged.
       * IMPORTANT:
       * Click / keyboard opening does NOT lock page scrolling.
       * Scroll locking is specifically for hover behavior.
       */
      if (!isOpen) {
        targetMenu.classList.add("open");
        trigger.classList.add("active");
      }
    });
  });
  /* PREVENT INSIDE CLICK FROM CLOSING MEGA MENU */
  megaMenus.forEach((menu) => {
    menu.addEventListener("click", (event) => {
      event.stopPropagation();
    });
  });
  /*OUTSIDE CLICK */
  document.addEventListener("click", () => {
    closeAllMegaMenus();
  });
  /* ESCAPE KEY */
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      closeAllMegaMenus();
    }
  });
  /* MEGA MENU HOVER SUPPORT */
  megaTriggers.forEach((trigger) => {
    const menuWrapper = trigger.closest(".relative.py-7");
    if (!menuWrapper) {
      return;
    }
    /* Open mega menu when the navigation item is hovered.*/
    menuWrapper.addEventListener("mouseenter", () => {
      const targetMenu = getMegaMenu(trigger);
      if (!targetMenu) {
        return;
      }
      /* Close any other open mega menu first.*/
      closeAllMegaMenus();
      /* Open the hovered mega menu.*/
      targetMenu.classList.add("open");
      trigger.classList.add("active");
      /* IMPORTANT:
       * Lock background page scrolling while the user
       * is hovering over the mega menu navigation area.
       * We DO NOT use:
       * document.body.style.overflow = "hidden";
       * because that would hide the browser scrollbar.
       * Instead, wheel / touch / keyboard scrolling is
       * prevented while the scrollbar itself remains visible.*/
      lockPageScroll();
    });
    /*Close mega menu and restore background scrolling when the mouse leaves the navigation / mega-menu area.*/
    menuWrapper.addEventListener("mouseleave", () => {
      const targetMenu = getMegaMenu(trigger);
      if (!targetMenu) {
        return;
      }
      targetMenu.classList.remove("open");
      trigger.classList.remove("active");
      /* Restore normal scrolling.*/
      unlockPageScroll();
    });
  });
  /* MEGA MENU TAB / SUBMENU SWITCHING */
  megaMenus.forEach((megaMenu) => {
    const tabButtons = megaMenu.querySelectorAll(
      "[data-tab-group][data-tab-target]",
    );
    tabButtons.forEach((button) => {
      button.addEventListener("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        const group = this.dataset.tabGroup;
        const target = this.dataset.tabTarget;
        if (!group || !target) {
          return;
        }
        /* ACTIVE TAB */
        megaMenu
          .querySelectorAll(`[data-tab-group="${CSS.escape(group)}"]`)
          .forEach((tab) => {
            tab.classList.remove("active");
          });
        this.classList.add("active");
        /* HIDE ALL PANELS */
        megaMenu
          .querySelectorAll(`[data-content-group="${CSS.escape(group)}"]`)
          .forEach((panel) => {
            panel.classList.add("hidden");
          });
        /* SHOW SELECTED PANEL */
        const panel = megaMenu.querySelector(
          `[data-content-group="${CSS.escape(
            group,
          )}"][data-content-id="${CSS.escape(target)}"]`,
        );
        if (panel) {
          panel.classList.remove("hidden");
        }
      });
    });
  });
  /* PACKAGE NAVIGATION - Scroll naturally then stick below main navbar */
  const packageNavigation = document.querySelector("#package-navigation");
  const packageNavigationPlaceholder = document.querySelector("#package-navigation-placeholder");

  if (packageNavigation && packageNavigationPlaceholder) {
    const mainNav = document.querySelector('nav[aria-label="Main Navigation"]');

    const handlePackageNavigation = () => {
      const mainNavHeight = mainNav ? mainNav.offsetHeight : 0;
      
      // Determine initial document position of package nav
      let initialTop;
      if (packageNavigation.classList.contains("package-nav-fixed")) {
        initialTop = packageNavigationPlaceholder.getBoundingClientRect().top + window.scrollY;
      } else {
        initialTop = packageNavigation.getBoundingClientRect().top + window.scrollY;
      }

      const shouldStick = window.scrollY >= (initialTop - mainNavHeight);

      if (shouldStick) {
        if (!packageNavigation.classList.contains("package-nav-fixed")) {
          packageNavigationPlaceholder.style.height = `${packageNavigation.offsetHeight}px`;
          packageNavigationPlaceholder.classList.remove("hidden");
          packageNavigation.classList.add("package-nav-fixed");
        }
        packageNavigation.style.top = `${mainNavHeight}px`;
      } else {
        packageNavigation.classList.remove("package-nav-fixed");
        packageNavigationPlaceholder.classList.add("hidden");
        packageNavigation.style.top = "";
      }
    };

    window.addEventListener("scroll", handlePackageNavigation, { passive: true });
    window.addEventListener("resize", handlePackageNavigation);
    window.addEventListener("load", handlePackageNavigation);
    handlePackageNavigation();
  }
  /* SCROLL TO TOP BUTTON */
  const scrollTopBtn = document.getElementById("scroll-to-top");
  if (scrollTopBtn) {
    const handleScrollTopButton = () => {
      scrollTopBtn.classList.toggle("hidden", window.scrollY <= 300);
    };
    window.addEventListener("scroll", handleScrollTopButton, {
      passive: true,
    });
    handleScrollTopButton();
    scrollTopBtn.addEventListener("click", (event) => {
      event.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  }
  /* SEARCH MODAL */
  const searchTriggers = document.querySelectorAll("[data-search-toggle]");
  const searchModal = document.getElementById("search-modal");
  const searchClose = document.getElementById("search-close");
  const searchInput = document.getElementById("search-input");
  if (searchModal) {
    searchTriggers.forEach((button) => {
      button.addEventListener("click", (event) => {
        event.preventDefault();
        searchModal.classList.remove("hidden");
        setTimeout(() => {
          searchInput?.focus();
        }, 100);
      });
    });
    if (searchClose) {
      searchClose.addEventListener("click", () => {
        searchModal.classList.add("hidden");
      });
    }
    searchModal.addEventListener("click", (event) => {
      if (event.target === searchModal) {
        searchModal.classList.add("hidden");
      }
    });
  }
  /* HERO MEDIA MODE - Hero Slider */
  const showVideo = true;

  /* HERO VIDEO */
  const heroVideo = {
    src: "assets/video/hero-video.mp4",
  };

  /* HERO SLIDER */
  const heroSlides = [
    {
      title: "MERA PEAK CLIMBING",
      tag: "TRENDING EXPEDITION",
      desc: "Mera Peak climbing is one of the more comfortable and quickest mountains for Peak climbing in Nepal.",
      bg: "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1920&q=80",
    },
    {
      title: "EVEREST BASE CAMP TREK",
      tag: "MOST POPULAR TREK",
      desc: "Experience the majestic Himalayas and reach the base camp of the highest mountain in the world on a trekking adventure.",
      bg: "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=1920&q=80",
    },
    {
      title: "ANNAPURNA CIRCUIT TREK",
      tag: "UNFORGETTABLE JOURNEY",
      desc: "Cross Thorong La Pass and witness breathtaking mountain vistas across classic Nepalese landscapes.",
      bg: "assets/img/background/bg-1.webp",
    },
  ];

  let currentSlide = 0;

  const heroBg = document.getElementById("hero-bg");
  const heroVideoElement = document.getElementById("hero-video");
  const heroTag = document.getElementById("hero-tag");
  const heroTitle = document.getElementById("hero-title");
  const heroDesc = document.getElementById("hero-desc");

  const updateHeroSlide = (index) => {
    if (showVideo || !heroBg || !heroSlides.length) {
      return;
    }

    currentSlide = (index + heroSlides.length) % heroSlides.length;
    const slide = heroSlides[currentSlide];
    heroBg.style.opacity = "0.4";

    setTimeout(() => {
      heroBg.style.backgroundImage = `url('${slide.bg}')`;

      if (heroTag) {
        heroTag.textContent = slide.tag;
      }

      if (heroTitle) {
        heroTitle.textContent = slide.title;
      }

      if (heroDesc) {
        heroDesc.textContent = slide.desc;
      }

      heroBg.style.opacity = "1";
    }, 300);
  };

  /* HERO VIDEO MODE */
  if (showVideo) {
    if (heroBg) {
      heroBg.classList.add("hidden");
    }

    if (heroVideoElement) {
      heroVideoElement.classList.remove("hidden");
      heroVideoElement.muted = true;
      heroVideoElement.loop = true;
      heroVideoElement.autoplay = true;
      heroVideoElement.playsInline = true;
      heroVideoElement.play().catch(() => {});
    }
  }

  /* HERO IMAGE MODE */
  if (!showVideo && heroBg) {
    if (heroVideoElement) {
      heroVideoElement.classList.add("hidden");
    }

    if (heroTitle) {
      updateHeroSlide(0);

      setInterval(() => {
        updateHeroSlide(currentSlide + 1);
      }, 5000);
    }
  }
  /* MOBILE DRAWER */
  const mobileToggle = document.getElementById("mobile-menu-toggle");
  const mobileDrawer = document.getElementById("mobile-menu-drawer");
  const mobileClose = document.getElementById("mobile-menu-close");
  if (mobileToggle && mobileDrawer) {
    mobileToggle.addEventListener("click", () => {
      mobileDrawer.classList.remove("hidden");
    });
    if (mobileClose) {
      mobileClose.addEventListener("click", () => {
        mobileDrawer.classList.add("hidden");
      });
    }
  }
  /* SATORI EXPERIENCE */
  const tabs = document.querySelectorAll(".experience-tab");
  const panels = document.querySelectorAll(".experience-panel");
  const videoModal = document.getElementById("videoModal");
  const videoModalContent = document.getElementById("videoModalContent");
  const videoIframe = document.getElementById("videoIframe");
  const videoModalTitle = document.getElementById("videoModalTitle");
  const closeVideoModal = document.getElementById("closeVideoModal");
  const imageModal = document.getElementById("imageModal");
  // const imageModalContent = document.getElementById("imageModalContent");
  // const galleryModalImage = document.getElementById("galleryModalImage");
  // const closeImageModal = document.getElementById("closeImageModal");
  /* Experience tabs */
  tabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      const selectedTab = this.dataset.tab;
      if (!selectedTab) {
        return;
      }
      tabs.forEach((item) => {
        item.classList.remove("active");
      });
      this.classList.add("active");
      panels.forEach((panel) => {
        panel.classList.add("hidden");
      });
      const selectedPanel = document.querySelector(
        `[data-panel="${CSS.escape(selectedTab)}"]`,
      );
      if (selectedPanel) {
        selectedPanel.classList.remove("hidden");
      }
    });
  });
  /* VIDEO MODAL */
  const openVideoModal = (videoUrl, title) => {
    if (!videoModal || !videoIframe) {
      return;
    }
    videoIframe.src = `${videoUrl}?autoplay=1&rel=0`;
    if (videoModalTitle) {
      videoModalTitle.textContent = title || "SATORI EXPERIENCE";
    }
    videoModal.classList.remove("hidden");
    videoModal.classList.add("flex", "modal-open");
    videoModal.setAttribute("aria-hidden", "false");
    document.body.classList.add("modal-open");
    requestAnimationFrame(() => {
      videoModalContent?.classList.remove("scale-95", "opacity-0");
      videoModalContent?.classList.add("scale-100", "opacity-100");
    });
  };
  const closeVideo = () => {
    if (!videoModal) {
      return;
    }
    videoModalContent?.classList.remove("scale-100", "opacity-100");
    videoModalContent?.classList.add("scale-95", "opacity-0");
    setTimeout(() => {
      videoModal.classList.remove("flex", "modal-open");
      videoModal.classList.add("hidden");
      videoModal.setAttribute("aria-hidden", "true");
      if (videoIframe) {
        videoIframe.src = "";
      }
      document.body.classList.remove("modal-open");
    }, 250);
  };
  const videoCards = document.querySelectorAll(".experience-card");
  videoCards.forEach((card) => {
    card.addEventListener("click", function () {
      const videoUrl = this.dataset.video;
      const title = this.dataset.title;
      if (videoUrl) {
        openVideoModal(videoUrl, title);
      }
    });
  });
  if (closeVideoModal) {
    closeVideoModal.addEventListener("click", closeVideo);
  }
  if (videoModal) {
    videoModal.addEventListener("click", (event) => {
      if (event.target === videoModal) {
        closeVideo();
      }
    });
  }
  /* GLOBAL ESCAPE HANDLER FOR MODALS */
  document.addEventListener("keydown", (event) => {
    if (event.key !== "Escape") {
      return;
    }
    if (videoModal && !videoModal.classList.contains("hidden")) {
      closeVideo();
    }
    if (imageModal && !imageModal.classList.contains("hidden")) {
      closeImage();
    }
  });
  /* SWIPER JS - Currently intentionally disabled, preserved from original. */
  const satoriEventsSwiper = new Swiper(".satori-events-swiper", {
    loop: true,
    speed: 700,
    grabCursor: true,
    watchOverflow: true,

    slidesPerView: 4,
    spaceBetween: 10,
    slidesPerGroup: 1,

    pagination: {
      el: ".satori-events-pagination",
      clickable: true,
      dynamicBullets: false,
    },

    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 16,
        slidesPerGroup: 1,
      },
      640: {
        slidesPerView: 2,
        spaceBetween: 18,
        slidesPerGroup: 1,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
        slidesPerGroup: 1,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 10,
        slidesPerGroup: 1,
      },
      1280: {
        slidesPerView: 4,
        spaceBetween: 10,
        slidesPerGroup: 1,
      },
    },
    a11y: {
      enabled: true,
      prevSlideMessage: "Previous event",
      nextSlideMessage: "Next event",
      paginationBulletMessage: "Go to event slide {{index}}",
    },
    keyboard: {
      enabled: true,
      onlyInViewport: true,
    },
    touchRatio: 1,
    threshold: 5,
    autoplay: true,
  });
  /* EVENT MODAL */
  const eventModal = document.getElementById("eventDetailsModal");
  const eventModalBackdrop = document.getElementById("eventModalBackdrop");
  const closeEventModal = document.getElementById("closeEventModal");
  const eventModalImage = document.getElementById("eventModalImage");
  const eventModalStatus = document.getElementById("eventModalStatus");
  const eventModalTitle = document.getElementById("eventModalTitle");
  const eventModalDate = document.getElementById("eventModalDate");
  const eventModalDescription = document.getElementById(
    "eventModalDescription",
  );
  if (
    eventModal &&
    eventModalBackdrop &&
    closeEventModal &&
    eventModalImage &&
    eventModalStatus &&
    eventModalTitle &&
    eventModalDate &&
    eventModalDescription
  ) {
    const openEventModal = (slide) => {
      if (!slide) {
        return;
      }
      const title = slide.dataset.eventTitle || "";
      const date = slide.dataset.eventDate || "";
      const status = slide.dataset.eventStatus || "UPCOMING EVENT";
      const description = slide.dataset.eventDescription || "";
      const image = slide.dataset.eventImage || "";
      eventModalTitle.textContent = title;
      eventModalDate.textContent = date;
      eventModalStatus.textContent = status;
      eventModalDescription.textContent = description;
      eventModalImage.src = image;
      eventModalImage.alt = title;
      eventModal.classList.remove("hidden");
      requestAnimationFrame(() => {
        eventModal.classList.add("is-open");
      });
      eventModal.setAttribute("aria-hidden", "false");
      document.body.classList.add("event-modal-open");
      closeEventModal.focus();
    };
    const closeEventDetailsModal = () => {
      eventModal.classList.remove("is-open");
      eventModal.setAttribute("aria-hidden", "true");
      document.body.classList.remove("event-modal-open");
      setTimeout(() => {
        eventModal.classList.add("hidden");
        eventModalImage.src = "";
      }, 300);
    };
    const attachEventCardListeners = () => {
      const eventSlides = document.querySelectorAll(".event-slide");
      eventSlides.forEach((slide) => {
        if (slide.dataset.modalBound === "true") {
          return;
        }
        slide.dataset.modalBound = "true";
        slide.addEventListener("click", function () {
          openEventModal(this);
        });
        slide.setAttribute("tabindex", "0");
        slide.setAttribute("role", "button");
        slide.addEventListener("keydown", (event) => {
          if (event.key === "Enter" || event.key === " ") {
            event.preventDefault();
            openEventModal(slide);
          }
        });
      });
    };
    attachEventCardListeners();
    closeEventModal.addEventListener("click", closeEventDetailsModal);
    eventModalBackdrop.addEventListener("click", closeEventDetailsModal);
    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape" && eventModal.classList.contains("is-open")) {
        closeEventDetailsModal();
      }
    });
    /* Observe dynamically added event slides. */
    const eventSwiper = document.querySelector(".satori-events-swiper");
    const eventSwiperWrapper = eventSwiper?.querySelector(".swiper-wrapper");
    if (eventSwiperWrapper) {
      const observer = new MutationObserver(() => {
        attachEventCardListeners();
      });
      observer.observe(eventSwiperWrapper, {
        childList: true,
        subtree: true,
      });
    }
  }
});
/* LANGUAGE DROPDOWN */
document.addEventListener("DOMContentLoaded", function () {
  const languageToggle = document.getElementById("language-toggle");
  const languageDropdown = document.getElementById("language-dropdown");
  const languageContainer = languageToggle?.parentElement;
  if (!languageToggle || !languageDropdown || !languageContainer) {
    return;
  }
  function closeLanguageDropdown() {
    languageDropdown.classList.add("hidden");
    languageToggle.setAttribute("aria-expanded", "false");
  }
  function openLanguageDropdown() {
    languageDropdown.classList.remove("hidden");
    languageToggle.setAttribute("aria-expanded", "true");
  }
  // Click toggle
  languageToggle.addEventListener("click", function (event) {
    event.stopPropagation();
    const isOpen = !languageDropdown.classList.contains("hidden");
    if (isOpen) {
      closeLanguageDropdown();
    } else {
      openLanguageDropdown();
    }
  });
  // Open on hover
  languageToggle.addEventListener("mouseenter", function () {
    openLanguageDropdown();
  });
  // Close when clicking outside
  document.addEventListener("click", function (event) {
    if (
      !languageContainer.contains(event.target) &&
      !languageDropdown.contains(event.target)
    ) {
      closeLanguageDropdown();
    }
  });
  // Close when scrolling
  window.addEventListener("scroll", function () {
    closeLanguageDropdown();
  });
  // Close with Escape
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      closeLanguageDropdown();
    }
  });
});
/* 6000M MOUNTAIN EXPEDITION SWIPER Manual Navigation Only */
document.addEventListener("DOMContentLoaded", function () {
  const expeditionSwiperElement = document.querySelector(".expedition-swiper");
  const expeditionPrevious = document.querySelector(".expedition-prev");
  const expeditionNext = document.querySelector(".expedition-next");
  if (
    !expeditionSwiperElement ||
    !expeditionPrevious ||
    !expeditionNext ||
    typeof Swiper === "undefined"
  ) {
    return;
  }
  const expeditionSwiper = new Swiper(expeditionSwiperElement, {
    autoplay: false,
    allowTouchMove: false,
    slidesPerView: 1,
    spaceBetween: 24,
    breakpoints: {
      640: {
        slidesPerView: 1.5,
        spaceBetween: 24,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 28,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 32,
      },
    },
    speed: 600,
    loop: false,
    a11y: {
      enabled: true,
    },
  });
  expeditionPrevious.addEventListener("click", function () {
    expeditionSwiper.slidePrev();
  });
  expeditionNext.addEventListener("click", function () {
    expeditionSwiper.slideNext();
  });
  function updateExpeditionButtons() {
    expeditionPrevious.disabled = expeditionSwiper.isBeginning;
    expeditionNext.disabled = expeditionSwiper.isEnd;
  }
  updateExpeditionButtons();
  expeditionSwiper.on("slideChange", updateExpeditionButtons);
  expeditionSwiper.on("init", updateExpeditionButtons);
});
//Everest Region Js
document.addEventListener("DOMContentLoaded", () => {
  const filterButtons = document.querySelectorAll(".satori-filter-btn");
  const sortSelect = document.getElementById("tour-sort");
  const resultCount = document.getElementById("tour-result-count");
  const emptyState = document.getElementById("tour-empty-state");
  const tourCards = Array.from(document.querySelectorAll("[data-tour-card]"));
  const categorySections = document.querySelectorAll("[data-category-section]");
  let activeFilter = "all";
  /* FILTER BUTTON STYLES */
  const setActiveFilterButton = (activeButton) => {
    filterButtons.forEach((button) => {
      const isActive = button === activeButton;

      button.classList.toggle("is-active", isActive);
      button.setAttribute("aria-selected", isActive ? "true" : "false");
    });
  };
  /*  FILTER + SORT TOURS */
  const updateTours = () => {
    const sortValue = sortSelect ? sortSelect.value : "featured";
    let visibleCards = [];
    /* FILTER CARDS */
    tourCards.forEach((card) => {
      const category = card.dataset.category;
      const matchesFilter = activeFilter === "all" || category === activeFilter;
      if (matchesFilter) {
        card.classList.remove("hidden");
        visibleCards.push(card);
      } else {
        card.classList.add("hidden");
      }
    });
    /* SORT VISIBLE CARDS */
    visibleCards.sort((a, b) => {
      const priceA = Number(a.dataset.price || 0);
      const priceB = Number(b.dataset.price || 0);
      const nameA = (a.dataset.name || "").toLowerCase();
      const nameB = (b.dataset.name || "").toLowerCase();
      switch (sortValue) {
        case "price-low":
          return priceA - priceB;
        case "price-high":
          return priceB - priceA;
        case "name":
          return nameA.localeCompare(nameB);
        case "featured":
        default:
          return 0;
      }
    });
    /* REBUILD CATEGORY GRIDS */
    categorySections.forEach((section) => {
      const grid = section.querySelector("[data-tour-grid]");
      if (!grid) {
        return;
      }
      const sectionCards = visibleCards.filter((card) => {
        return card.dataset.category === section.dataset.categorySection;
      });
      sectionCards.forEach((card) => {
        grid.appendChild(card);
      });
    });
    /* SHOW / HIDE CATEGORY SECTIONS */
    categorySections.forEach((section) => {
      const cards = section.querySelectorAll("[data-tour-card]");
      const hasVisibleCards = Array.from(cards).some((card) => {
        return !card.classList.contains("hidden");
      });
      section.classList.toggle("hidden", !hasVisibleCards);
    });
    /* RESULT COUNT */
    if (resultCount) {
      const count = visibleCards.length;
      resultCount.textContent = `${count} ${count === 1 ? "adventure" : "adventures"} available`;
    }
    /* EMPTY STATE */
    if (emptyState) {
      emptyState.hidden = visibleCards.length !== 0;
      emptyState.classList.toggle("hidden", visibleCards.length !== 0);
    }
  };
  /* FILTER BUTTON EVENTS */
  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      activeFilter = button.dataset.filter || "all";
      setActiveFilterButton(button);
      updateTours();
    });
  });
  /* SORT EVENT */
  if (sortSelect) {
    sortSelect.addEventListener("change", () => {
      updateTours();
    });
  }
  /* INITIAL STATE */
  const initialActiveButton =
    document.querySelector(".satori-filter-btn.is-active") ||
    document.querySelector('.satori-filter-btn[data-filter="all"]');
  if (initialActiveButton) {
    setActiveFilterButton(initialActiveButton);
  }
  updateTours();
});
// SATORI TEAM PAGE - Team Category Filter
document.addEventListener("DOMContentLoaded", () => {
  const teamPage = document.querySelector(".satori-team-page");
  if (!teamPage) {
    return;
  }
  const teamFilterButtons = teamPage.querySelectorAll(".team-filter-btn");
  const teamCategorySections = teamPage.querySelectorAll(
    ".team-category-section",
  );
  function filterTeamSections(category) {
    teamCategorySections.forEach((section) => {
      const sectionCategory = section.dataset.categorySection;
      if (category === "all") {
        section.classList.remove("hidden");
        return;
      }
      if (sectionCategory === category) {
        section.classList.remove("hidden");
      } else {
        section.classList.add("hidden");
      }
    });
  }
  function updateTeamActiveButton(activeButton) {
    teamFilterButtons.forEach((button) => {
      button.classList.remove("bg-[#12334a]", "text-white");
      button.classList.add("bg-[#e5edf5]", "text-[var(--figma-navy)]");
      button.setAttribute("aria-selected", "false");
    });
    activeButton.classList.remove("bg-[#e5edf5]", "text-[var(--figma-navy)]");
    activeButton.classList.add("bg-[#12334a]", "text-white");
    activeButton.setAttribute("aria-selected", "true");
  }
  teamFilterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const selectedCategory = button.dataset.filter || "all";
      updateTeamActiveButton(button);
      filterTeamSections(selectedCategory);
      button.scrollIntoView({
        behavior: "smooth",
        block: "nearest",
        inline: "center",
      });
    });
  });
  const defaultTeamButton = teamPage.querySelector(
    '.team-filter-btn[data-filter="all"]',
  );
  if (defaultTeamButton) {
    updateTeamActiveButton(defaultTeamButton);
    filterTeamSections("all");
  }
});
// document.addEventListener("DOMContentLoaded", function () {
//   const galleryPage = document.querySelector(".satori-gallery-page");
//   if (!galleryPage) {
//     return;
//   }
//   const mainTabs = galleryPage.querySelectorAll(".gallery-main-tab");
//   const categoryFilters = galleryPage.querySelectorAll(
//     ".gallery-category-filter",
//   );
//   const galleryGrid = galleryPage.querySelector("#gallery-grid");
//   const galleryItems = Array.from(
//     galleryPage.querySelectorAll(".gallery-media-item"),
//   );
//   const searchInput = galleryPage.querySelector("#gallery-search");
//   const sortSelect = galleryPage.querySelector("#gallery-sort");
//   const categoryBar = galleryPage.querySelector("#gallery-category-bar");
//   const galleryTools = galleryPage.querySelector("#gallery-tools");
//   const galleryEmpty = galleryPage.querySelector("#gallery-empty");
//   const pastTripsSection = galleryPage.querySelector("#past-trips-section");
//   const pastTripItems = Array.from(
//     galleryPage.querySelectorAll(".gallery-past-trip-item"),
//   );
//   const pagination = galleryPage.querySelector("#gallery-pagination");
//   /* ALBUM MODAL */
//   const albumModal = galleryPage.querySelector("#gallery-album-modal");
//   const albumModalContent = galleryPage.querySelector(
//     "#gallery-album-modal-content",
//   );
//   const albumClose = galleryPage.querySelector("#gallery-album-close");
//   const albumTitle = galleryPage.querySelector("#gallery-album-title");
//   const albumCount = galleryPage.querySelector("#gallery-album-count");
//   const albumGrid = galleryPage.querySelector("#gallery-album-grid");
//   /* LIGHTBOX */
//   const lightbox = galleryPage.querySelector("#gallery-lightbox");
//   const lightboxImage = galleryPage.querySelector("#gallery-lightbox-image");
//   const lightboxVideo = galleryPage.querySelector("#gallery-lightbox-video");
//   const lightboxTitle = galleryPage.querySelector("#gallery-lightbox-title");
//   const lightboxCounter = galleryPage.querySelector(
//     "#gallery-lightbox-counter",
//   );
//   const lightboxClose = galleryPage.querySelector("#gallery-lightbox-close");
//   const lightboxPrev = galleryPage.querySelector("#gallery-lightbox-prev");
//   const lightboxNext = galleryPage.querySelector("#gallery-lightbox-next");
//   let activeGalleryType = "photos";
//   let activeCategory = "recent";
//   let activeSearch = "";
//   let activeSort = "recent";
//   let currentAlbum = null;
//   let lightboxItems = [];
//   let lightboxIndex = 0;
//   let lightboxMode = null;
//   /* MAIN TAB UI */
//   function updateMainTabs(activeButton) {
//     mainTabs.forEach(function (button) {
//       const isActive = button === activeButton;
//       button.setAttribute("aria-selected", isActive ? "true" : "false");
//       button.classList.toggle("bg-[var(--primary-dark)]", isActive);
//       button.classList.toggle("text-white", isActive);
//       button.classList.toggle("shadow-sm", isActive);
//       button.classList.toggle("bg-[#e8f0f6]", !isActive);
//       button.classList.toggle("text-[var(--primary-dark)]", !isActive);
//     });
//   }
//   /* CATEGORY UI */
//   function updateCategoryButtons(activeButton) {
//     categoryFilters.forEach(function (button) {
//       const isActive = button === activeButton;
//       button.setAttribute("aria-selected", isActive ? "true" : "false");
//       button.classList.toggle("bg-[var(--primary-dark)]", isActive);
//       button.classList.toggle("text-white", isActive);
//       button.classList.toggle("shadow-sm", isActive);
//       button.classList.toggle("bg-[#e8f0f6]", !isActive);
//       button.classList.toggle("text-[var(--primary-dark)]", !isActive);
//     });
//   }
//   /* FILTER PHOTO / VIDEO GRID */
//   function filterGallery() {
//     if (!galleryGrid) {
//       return;
//     }
//     const search = activeSearch.trim().toLowerCase();
//     let visibleCount = 0;
//     galleryItems.forEach(function (item) {
//       const type = item.dataset.galleryType || "";
//       const category = item.dataset.galleryCategory || "";
//       const title = (item.dataset.galleryTitle || "").toLowerCase();
//       const matchesType = type === activeGalleryType;
//       const matchesCategory =
//         activeCategory === "recent" ? true : category === activeCategory;
//       const matchesSearch = search === "" ? true : title.includes(search);
//       const visible = matchesType && matchesCategory && matchesSearch;
//       item.classList.toggle("hidden", !visible);
//       if (visible) {
//         visibleCount++;
//       }
//     });
//     galleryGrid.classList.toggle(
//       "gallery-filtered",
//       activeCategory !== "recent",
//     );
//     if (galleryEmpty) {
//       galleryEmpty.classList.toggle("hidden", visibleCount > 0);
//     }
//   }
//   /* SORT NORMAL GALLERY */
//   function sortGallery() {
//     if (!galleryGrid) {
//       return;
//     }
//     const sorted = [...galleryItems].sort(function (a, b) {
//       const dateA = a.dataset.galleryDate || "";
//       const dateB = b.dataset.galleryDate || "";
//       const titleA = (a.dataset.galleryTitle || "").toLowerCase();
//       const titleB = (b.dataset.galleryTitle || "").toLowerCase();
//       if (activeSort === "newest") {
//         return dateB.localeCompare(dateA);
//       }
//       if (activeSort === "oldest") {
//         return dateA.localeCompare(dateB);
//       }
//       if (activeSort === "az") {
//         return titleA.localeCompare(titleB);
//       }
//       return 0;
//     });
//     sorted.forEach(function (item) {
//       galleryGrid.appendChild(item);
//     });
//   }
//   /* SORT PAST TRIPS */
//   function sortPastTrips() {
//     const pastTripsGrid = galleryPage.querySelector("#past-trips-grid");
//     if (!pastTripsGrid) {
//       return;
//     }
//     const sorted = [...pastTripItems].sort(function (a, b) {
//       const dateA = a.dataset.galleryDate || "";
//       const dateB = b.dataset.galleryDate || "";
//       const titleA = (a.dataset.galleryTitle || "").toLowerCase();
//       const titleB = (b.dataset.galleryTitle || "").toLowerCase();
//       if (activeSort === "newest") {
//         return dateB.localeCompare(dateA);
//       }
//       if (activeSort === "oldest") {
//         return dateA.localeCompare(dateB);
//       }
//       if (activeSort === "az") {
//         return titleA.localeCompare(titleB);
//       }
//       return 0;
//     });
//     sorted.forEach(function (item) {
//       pastTripsGrid.appendChild(item);
//     });
//   }
//   /* GET ALBUM PHOTOS */
//   function getAlbumPhotos(album) {
//     if (!album) {
//       return [];
//     }
//     return galleryItems.filter(function (item) {
//       return (
//         item.dataset.galleryType === "photos" &&
//         item.dataset.galleryAlbum === album
//       );
//     });
//   }
//   /* GET VIDEOS */
//   function getVideoItems() {
//     const search = activeSearch.trim().toLowerCase();
//     return galleryItems.filter(function (item) {
//       if (item.dataset.galleryType !== "videos") {
//         return false;
//       }
//       const category = item.dataset.galleryCategory || "";
//       const title = (item.dataset.galleryTitle || "").toLowerCase();
//       const matchesCategory =
//         activeCategory === "recent" ? true : category === activeCategory;
//       const matchesSearch = search === "" ? true : title.includes(search);
//       return matchesCategory && matchesSearch;
//     });
//   }
//   /* OPEN ALBUM MODAL */
//   function openAlbumModal(item) {
//     if (!albumModal || !albumGrid || !item) {
//       return;
//     }
//     const album = item.dataset.galleryAlbum || "";
//     const title = item.dataset.galleryTitle || "Satori Adventures Gallery";
//     const albumItems = getAlbumPhotos(album);
//     if (!albumItems.length) {
//       return;
//     }
//     currentAlbum = album;
//     albumTitle.textContent = title;
//     albumCount.textContent = `${albumItems.length} ${
//       albumItems.length === 1 ? "PHOTO" : "PHOTOS"
//     }`;
//     albumGrid.innerHTML = "";
//     albumItems.forEach(function (photo, index) {
//       const button = document.createElement("button");
//       button.type = "button";
//       button.className =
//         "group relative aspect-[4/3] overflow-hidden rounded-lg bg-slate-100 shadow-sm ring-1 ring-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-[var(--teal-brand)]";
//       const image = photo.dataset.galleryImage || "";
//       const photoTitle = photo.dataset.galleryTitle || title;
//       const sourceImage = photo.querySelector("img");
//       const alt = sourceImage ? sourceImage.alt : photoTitle;
//       button.innerHTML = `
//         <img
//           src="${image}"
//           alt="${alt}"
//           loading="lazy"
//           decoding="async"
//           class="h-full w-full object-cover transition duration-700 ease-out group-hover:scale-[1.05]"
//         >
//         <span
//           class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"
//           aria-hidden="true"
//         ></span>
//         <span
//           class="absolute bottom-3 left-3 rounded-full bg-black/60 px-3 py-1 text-xs font-semibold text-white backdrop-blur-sm"
//         >
//           ${index + 1}
//         </span>
//       `;
//       button.addEventListener("click", function () {
//         openAlbumLightbox(albumItems, index);
//       });
//       albumGrid.appendChild(button);
//     });
//     albumModal.classList.remove("hidden");
//     albumModal.classList.add("flex");
//     albumModal.setAttribute("aria-hidden", "false");
//     document.body.classList.add("gallery-lightbox-open");
//     requestAnimationFrame(function () {
//       if (albumModalContent) {
//         albumModalContent.classList.remove("scale-95", "opacity-0");
//         albumModalContent.classList.add("scale-100", "opacity-100");
//       }
//     });
//   }
//   /* CLOSE ALBUM MODAL */
//   function closeAlbumModal() {
//     if (!albumModal) {
//       return;
//     }
//     albumModal.classList.remove("flex");
//     albumModal.classList.add("hidden");
//     albumModal.setAttribute("aria-hidden", "true");
//     if (albumGrid) {
//       albumGrid.innerHTML = "";
//     }
//     currentAlbum = null;
//     if (!lightbox || lightbox.classList.contains("hidden")) {
//       document.body.classList.remove("gallery-lightbox-open");
//     }
//   }
//   /* OPEN ALBUM LIGHTBOX */
//   function openAlbumLightbox(albumItems, index) {
//     if (!lightbox || !albumItems.length) {
//       return;
//     }
//     lightboxMode = "photos";
//     lightboxItems = albumItems;
//     lightboxIndex = index >= 0 ? index : 0;
//     closeAlbumModal();
//     renderLightbox();
//     lightbox.classList.remove("hidden");
//     requestAnimationFrame(function () {
//       lightbox.classList.remove("opacity-0");
//     });
//     lightbox.setAttribute("aria-hidden", "false");
//     document.body.classList.add("gallery-lightbox-open");
//   }
//   /* OPEN VIDEO LIGHTBOX */
//   function openVideoLightbox(item) {
//     if (!lightbox || !item) {
//       return;
//     }
//     const videos = getVideoItems();
//     if (!videos.length) {
//       return;
//     }
//     lightboxMode = "videos";
//     lightboxItems = videos;
//     const index = videos.indexOf(item);
//     lightboxIndex = index >= 0 ? index : 0;
//     /*
//      * Open the lightbox first.
//      * This ensures the video element is visible
//      * before playback starts.
//      */
//     lightbox.classList.remove("hidden");
//     lightbox.setAttribute("aria-hidden", "false");
//     document.body.classList.add("gallery-lightbox-open");
//     /* Render the selected video.*/
//     renderLightbox();
//     /* Fade in the lightbox.*/
//     requestAnimationFrame(function () {
//       lightbox.classList.remove("opacity-0");
//     });
//   }
//   /* RENDER LIGHTBOX */
//   function renderLightbox() {
//     if (!lightboxItems.length || !lightboxImage || !lightboxVideo) {
//       return;
//     }
//     const item = lightboxItems[lightboxIndex];
//     if (!item) {
//       return;
//     }
//     const image = item.dataset.galleryImage || "";
//     const video = item.dataset.galleryVideo || "";
//     const title = item.dataset.galleryTitle || "Satori Adventures Gallery";
//     const thumbnail = item.querySelector("img");
//     /* Reset current media.*/
//     lightboxImage.classList.add("hidden");
//     lightboxVideo.classList.add("hidden");
//     lightboxVideo.pause();
//     lightboxVideo.currentTime = 0;
//     lightboxVideo.removeAttribute("src");
//     lightboxVideo.load();
//     /* VIDEO*/
//     if (lightboxMode === "videos" && video) {
//       /* Set the actual video URL from data-gallery-video.*/
//       lightboxVideo.src = video;
//       /* Make the video visible.*/
//       lightboxVideo.classList.remove("hidden");
//       /* Load the selected video.*/
//       lightboxVideo.load();
//       const playPromise = lightboxVideo.play();
//       if (playPromise !== undefined) {
//         playPromise.catch(function (error) {
//           console.warn("Video autoplay was blocked:", error);
//         });
//       }
//     } else {
//       /* IMAGE*/
//       lightboxImage.src = image;
//       lightboxImage.alt = thumbnail?.alt || title;
//       lightboxImage.classList.remove("hidden");
//     }
//     /* TITLE*/
//     if (lightboxTitle) {
//       lightboxTitle.textContent = title;
//     }
//     /* COUNTER */
//     if (lightboxCounter) {
//       lightboxCounter.textContent = `${lightboxIndex + 1} / ${lightboxItems.length}`;
//     }
//     /* PREVIOUS / NEXT*/
//     const onlyOne = lightboxItems.length <= 1;
//     lightboxPrev.disabled = onlyOne;
//     lightboxNext.disabled = onlyOne;
//     lightboxPrev.classList.toggle("opacity-40", onlyOne);
//     lightboxNext.classList.toggle("opacity-40", onlyOne);
//   }
//   /* CLOSE LIGHTBOX */
//   function closeLightbox() {
//     if (!lightbox) {
//       return;
//     }
//     lightbox.classList.add("opacity-0");
//     /* Completely stop and reset video.*/
//     if (lightboxVideo) {
//       lightboxVideo.pause();
//       lightboxVideo.currentTime = 0;
//       lightboxVideo.removeAttribute("src");
//       lightboxVideo.load();
//       lightboxVideo.classList.add("hidden");
//     }
//     window.setTimeout(function () {
//       lightbox.classList.add("hidden");
//       lightbox.setAttribute("aria-hidden", "true");
//       if (lightboxImage) {
//         lightboxImage.src = "";
//       }
//       if (lightboxTitle) {
//         lightboxTitle.textContent = "";
//       }
//       if (lightboxCounter) {
//         lightboxCounter.textContent = "";
//       }
//       lightboxItems = [];
//       lightboxIndex = 0;
//       lightboxMode = null;
//       currentAlbum = null;
//       document.body.classList.remove("gallery-lightbox-open");
//     }, 250);
//   }
//   /* PREVIOUS */
//   function showPrevious() {
//     if (lightboxItems.length <= 1) {
//       return;
//     }
//     lightboxIndex =
//       lightboxIndex <= 0 ? lightboxItems.length - 1 : lightboxIndex - 1;
//     renderLightbox();
//   }
//   /* NEXT */
//   function showNext() {
//     if (lightboxItems.length <= 1) {
//       return;
//     }
//     lightboxIndex =
//       lightboxIndex >= lightboxItems.length - 1 ? 0 : lightboxIndex + 1;
//     renderLightbox();
//   }
//   /* MAIN TABS */
//   mainTabs.forEach(function (button) {
//     button.addEventListener("click", function () {
//       activeGalleryType = this.dataset.galleryType || "photos";
//       updateMainTabs(this);
//       if (activeGalleryType === "past-trips") {
//         if (galleryGrid) {
//           galleryGrid.classList.add("hidden");
//         }
//         if (categoryBar) {
//           categoryBar.classList.add("hidden");
//         }
//         if (galleryTools) {
//           galleryTools.classList.add("hidden");
//         }
//         if (pagination) {
//           pagination.classList.add("hidden");
//         }
//         if (pastTripsSection) {
//           pastTripsSection.classList.remove("hidden");
//         }
//       } else {
//         if (galleryGrid) {
//           galleryGrid.classList.remove("hidden");
//         }
//         if (categoryBar) {
//           categoryBar.classList.remove("hidden");
//         }
//         if (galleryTools) {
//           galleryTools.classList.remove("hidden");
//         }
//         if (pagination) {
//           pagination.classList.remove("hidden");
//         }
//         if (pastTripsSection) {
//           pastTripsSection.classList.add("hidden");
//         }
//         filterGallery();
//       }
//       this.scrollIntoView({
//         behavior: "smooth",
//         block: "nearest",
//         inline: "center",
//       });
//     });
//   });
//   /* CATEGORY FILTERS */
//   categoryFilters.forEach(function (button) {
//     button.addEventListener("click", function () {
//       activeCategory = this.dataset.galleryCategory || "recent";
//       updateCategoryButtons(this);
//       filterGallery();
//       this.scrollIntoView({
//         behavior: "smooth",
//         block: "nearest",
//         inline: "center",
//       });
//     });
//   });
//   /* SEARCH */
//   if (searchInput) {
//     searchInput.addEventListener("input", function () {
//       activeSearch = this.value;
//       filterGallery();
//     });
//   }
//   /* SORT */
//   if (sortSelect) {
//     sortSelect.addEventListener("change", function () {
//       activeSort = this.value;
//       sortGallery();
//       sortPastTrips();
//       filterGallery();
//     });
//   }
//   /* PHOTO ALBUM CLICK */
//   galleryPage
//     .querySelectorAll(
//       ".gallery-media-item[data-gallery-type='photos'] .gallery-open",
//     )
//     .forEach(function (button) {
//       button.addEventListener("click", function (event) {
//         event.preventDefault();
//         const item = this.closest(".gallery-media-item");
//         if (item) {
//           openAlbumModal(item);
//         }
//       });
//     });
//   /* VIDEO CLICK */
//   galleryPage
//     .querySelectorAll(
//       ".gallery-media-item[data-gallery-type='videos'] .gallery-open",
//     )
//     .forEach(function (button) {
//       button.addEventListener("click", function (event) {
//         event.preventDefault();
//         const item = this.closest(".gallery-media-item");
//         if (item) {
//           openVideoLightbox(item);
//         }
//       });
//     });
//   /* ALBUM CLOSE */
//   if (albumClose) {
//     albumClose.addEventListener("click", closeAlbumModal);
//   }
//   if (albumModal) {
//     albumModal.addEventListener("click", function (event) {
//       if (event.target === albumModal) {
//         closeAlbumModal();
//       }
//     });
//   }
//   /* LIGHTBOX CLOSE */
//   if (lightboxClose) {
//     lightboxClose.addEventListener("click", closeLightbox);
//   }
//   /* LIGHTBOX PREVIOUS */
//   if (lightboxPrev) {
//     lightboxPrev.addEventListener("click", function (event) {
//       event.preventDefault();
//       showPrevious();
//     });
//   }
//   /* LIGHTBOX NEXT */
//   if (lightboxNext) {
//     lightboxNext.addEventListener("click", function (event) {
//       event.preventDefault();
//       showNext();
//     });
//   }
//   /* LIGHTBOX OUTSIDE CLICK */
//   if (lightbox) {
//     lightbox.addEventListener("click", function (event) {
//       if (event.target === lightbox) {
//         closeLightbox();
//       }
//     });
//   }
//   /* KEYBOARD CONTROLS */
//   document.addEventListener("keydown", function (event) {
//     const albumOpen = albumModal && !albumModal.classList.contains("hidden");
//     const lightboxOpen = lightbox && !lightbox.classList.contains("hidden");
//     if (!albumOpen && !lightboxOpen) {
//       return;
//     }
//     /* ESCAPE*/
//     if (event.key === "Escape") {
//       event.preventDefault();
//       if (lightboxOpen) {
//         closeLightbox();
//         return;
//       }
//       if (albumOpen) {
//         closeAlbumModal();
//         return;
//       }
//     }
//     /* PREVIOUS*/
//     if (lightboxOpen && event.key === "ArrowLeft") {
//       event.preventDefault();
//       showPrevious();
//       return;
//     }
//     /* NEXT*/
//     if (lightboxOpen && event.key === "ArrowRight") {
//       event.preventDefault();
//       showNext();
//     }
//   });
//   /* DEFAULT STATE */
//   const defaultMainTab = galleryPage.querySelector(
//     '.gallery-main-tab[data-gallery-type="photos"]',
//   );
//   const defaultCategory = galleryPage.querySelector(
//     '.gallery-category-filter[data-gallery-category="recent"]',
//   );
//   if (defaultMainTab) {
//     updateMainTabs(defaultMainTab);
//   }
//   if (defaultCategory) {
//     updateCategoryButtons(defaultCategory);
//   }
//   sortGallery();
//   sortPastTrips();
//   filterGallery();
// });
document.addEventListener("DOMContentLoaded", function () {
  const galleryPage = document.querySelector(".satori-gallery-page");
  if (!galleryPage) {
    return;
  }
  const mainTabs = galleryPage.querySelectorAll(".gallery-main-tab");
  const categoryFilters = galleryPage.querySelectorAll(
    ".gallery-category-filter",
  );
  const galleryGrid = galleryPage.querySelector("#gallery-grid");
  const galleryItems = Array.from(
    galleryPage.querySelectorAll(".gallery-media-item"),
  );
  const searchInput = galleryPage.querySelector("#gallery-search");
  const sortSelect = galleryPage.querySelector("#gallery-sort");
  const categoryBar = galleryPage.querySelector("#gallery-category-bar");
  const galleryTools = galleryPage.querySelector("#gallery-tools");
  const galleryEmpty = galleryPage.querySelector("#gallery-empty");
  const pastTripsSection = galleryPage.querySelector("#past-trips-section");
  const pastTripItems = Array.from(
    galleryPage.querySelectorAll(".gallery-past-trip-item"),
  );
  const pagination = galleryPage.querySelector("#gallery-pagination");
  /* ALBUM MODAL */
  const albumModal = galleryPage.querySelector("#gallery-album-modal");
  const albumModalContent = galleryPage.querySelector(
    "#gallery-album-modal-content",
  );
  const albumClose = galleryPage.querySelector("#gallery-album-close");
  const albumTitle = galleryPage.querySelector("#gallery-album-title");
  const albumCount = galleryPage.querySelector("#gallery-album-count");
  const albumGrid = galleryPage.querySelector("#gallery-album-grid");
  /* LIGHTBOX */
  const lightbox = galleryPage.querySelector("#gallery-lightbox");
  const lightboxImage = galleryPage.querySelector("#gallery-lightbox-image");
  const lightboxVideo = galleryPage.querySelector("#gallery-lightbox-video");
  const lightboxTitle = galleryPage.querySelector("#gallery-lightbox-title");
  const lightboxCounter = galleryPage.querySelector(
    "#gallery-lightbox-counter",
  );
  const lightboxClose = galleryPage.querySelector("#gallery-lightbox-close");
  const lightboxPrev = galleryPage.querySelector("#gallery-lightbox-prev");
  const lightboxNext = galleryPage.querySelector("#gallery-lightbox-next");
  let activeGalleryType = "photos";
  let activeCategory = "recent";
  let activeSearch = "";
  let activeSort = "recent";
  let currentAlbum = null;
  let lightboxItems = [];
  let lightboxIndex = 0;
  let lightboxMode = null;
  /* MAIN TAB UI */
  function updateMainTabs(activeButton) {
    mainTabs.forEach(function (button) {
      const isActive = button === activeButton;
      button.setAttribute("aria-selected", isActive ? "true" : "false");
      button.classList.toggle("bg-[var(--primary-dark)]", isActive);
      button.classList.toggle("text-white", isActive);
      button.classList.toggle("shadow-sm", isActive);
      button.classList.toggle("bg-[#e8f0f6]", !isActive);
      button.classList.toggle("text-[var(--primary-dark)]", !isActive);
    });
  }
  /* CATEGORY UI */
  function updateCategoryButtons(activeButton) {
    categoryFilters.forEach(function (button) {
      const isActive = button === activeButton;
      button.setAttribute("aria-selected", isActive ? "true" : "false");
      button.classList.toggle("bg-[var(--primary-dark)]", isActive);
      button.classList.toggle("text-white", isActive);
      button.classList.toggle("shadow-sm", isActive);
      button.classList.toggle("bg-[#e8f0f6]", !isActive);
      button.classList.toggle("text-[var(--primary-dark)]", !isActive);
    });
  }
  /* GRID LAYOUT */
  function updateGridLayout() {
    if (!galleryGrid) {
      return;
    }
    const shouldReflow =
      activeSearch.trim() !== "" ||
      activeCategory !== "recent" ||
      activeSort !== "recent";
    galleryGrid.classList.toggle("gallery-reflow", shouldReflow);
    galleryItems.forEach(function (item) {
      if (shouldReflow) {
        item.style.gridColumn = "auto";
        item.style.gridRow = "auto";
        item.style.height = "232px";
      } else {
        item.style.removeProperty("grid-column");
        item.style.removeProperty("grid-row");
        item.style.removeProperty("height");
      }
    });
  }
  /* FILTER PHOTO / VIDEO GRID */
  function filterGallery() {
    if (!galleryGrid) {
      return;
    }
    const search = activeSearch.trim().toLowerCase();
    let visibleCount = 0;
    galleryItems.forEach(function (item) {
      const type = item.dataset.galleryType || "";
      const category = item.dataset.galleryCategory || "";
      const title = (item.dataset.galleryTitle || "").toLowerCase();
      const imageAlt = (item.querySelector("img")?.alt || "").toLowerCase();
      const matchesType = type === activeGalleryType;
      const matchesCategory =
        activeCategory === "recent" ? true : category === activeCategory;
      const matchesSearch =
        search === ""
          ? true
          : title.includes(search) || imageAlt.includes(search);
      const visible = matchesType && matchesCategory && matchesSearch;
      item.classList.toggle("hidden", !visible);
      if (visible) {
        visibleCount++;
      }
    });
    galleryGrid.classList.toggle(
      "gallery-filtered",
      activeCategory !== "recent",
    );
    updateGridLayout();
    if (galleryEmpty) {
      galleryEmpty.classList.toggle("hidden", visibleCount > 0);
    }
  }
  /* SORT NORMAL GALLERY */
  function getGalleryYear(item) {
    if (!item) {
      return 0;
    }
    const explicitYear = Number(item.dataset.galleryYear || 0);
    if (explicitYear > 0) {
      return explicitYear;
    }
    const title = item.dataset.galleryTitle || "";
    const titleMatch = title.match(/\b(19|20)\d{2}\b/);
    if (titleMatch) {
      return Number(titleMatch[0]);
    }
    const date = item.dataset.galleryDate || "";
    const dateMatch = date.match(/^(19|20)\d{2}/);
    return dateMatch ? Number(dateMatch[0]) : 0;
  }
  function getGalleryTimestamp(item) {
    const value = item?.dataset.galleryDate || "";
    const timestamp = Date.parse(value);
    return Number.isNaN(timestamp) ? 0 : timestamp;
  }
  function compareGalleryItems(a, b) {
    const titleA = (a.dataset.galleryTitle || "").toLowerCase();
    const titleB = (b.dataset.galleryTitle || "").toLowerCase();
    if (activeSort === "newest") {
      return (
        getGalleryTimestamp(b) - getGalleryTimestamp(a) ||
        titleA.localeCompare(titleB)
      );
    }
    if (activeSort === "years") {
      return (
        getGalleryYear(b) - getGalleryYear(a) ||
        getGalleryTimestamp(b) - getGalleryTimestamp(a) ||
        titleA.localeCompare(titleB)
      );
    }
    if (activeSort === "oldest") {
      return (
        getGalleryTimestamp(a) - getGalleryTimestamp(b) ||
        titleA.localeCompare(titleB)
      );
    }
    if (activeSort === "az") {
      return titleA.localeCompare(titleB);
    }
    return 0;
  }
  function sortGallery() {
    if (!galleryGrid) {
      return;
    }
    const sorted = [...galleryItems].sort(compareGalleryItems);
    sorted.forEach(function (item) {
      galleryGrid.appendChild(item);
    });
    updateGridLayout();
  }
  /* SORT PAST TRIPS */
  function sortPastTrips() {
    const pastTripsGrid = galleryPage.querySelector("#past-trips-grid");
    if (!pastTripsGrid) {
      return;
    }
    const sorted = [...pastTripItems].sort(compareGalleryItems);
    sorted.forEach(function (item) {
      pastTripsGrid.appendChild(item);
    });
  }
  /* GET ALBUM PHOTOS */
  function getAlbumPhotos(album) {
    if (!album) {
      return [];
    }
    return galleryItems.filter(function (item) {
      return (
        item.dataset.galleryType === "photos" &&
        item.dataset.galleryAlbum === album
      );
    });
  }
  /* GET VIDEOS */
  function getVideoItems() {
    const search = activeSearch.trim().toLowerCase();
    const videos = galleryItems.filter(function (item) {
      if (item.dataset.galleryType !== "videos") {
        return false;
      }
      const category = item.dataset.galleryCategory || "";
      const title = (item.dataset.galleryTitle || "").toLowerCase();
      const imageAlt = (item.querySelector("img")?.alt || "").toLowerCase();
      const matchesCategory =
        activeCategory === "recent" ? true : category === activeCategory;
      const matchesSearch =
        search === ""
          ? true
          : title.includes(search) || imageAlt.includes(search);
      return matchesCategory && matchesSearch;
    });
    return videos.sort(compareGalleryItems);
  }
  /* OPEN ALBUM MODAL */
  function openAlbumModal(item) {
    if (!albumModal || !albumGrid || !item) {
      return;
    }
    const album = item.dataset.galleryAlbum || "";
    const title = item.dataset.galleryTitle || "Satori Adventures Gallery";
    const albumItems = getAlbumPhotos(album);
    if (!albumItems.length) {
      return;
    }
    currentAlbum = album;
    albumTitle.textContent = title;
    albumCount.textContent = `${albumItems.length} ${
      albumItems.length === 1 ? "PHOTO" : "PHOTOS"
    }`;
    albumGrid.innerHTML = "";
    albumItems.forEach(function (photo, index) {
      const button = document.createElement("button");
      button.type = "button";
      button.className =
        "group relative aspect-[4/3] overflow-hidden rounded-lg bg-slate-100 shadow-sm ring-1 ring-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-[var(--teal-brand)]";
      const image = photo.dataset.galleryImage || "";
      const photoTitle = photo.dataset.galleryTitle || title;
      const sourceImage = photo.querySelector("img");
      const alt = sourceImage ? sourceImage.alt : photoTitle;
      button.innerHTML = `
        <img
          src="${image}"
          alt="${alt}"
          loading="lazy"
          decoding="async"
          class="h-full w-full object-cover transition duration-700 ease-out group-hover:scale-[1.05]"
        >
        <span
          class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"
          aria-hidden="true"
        ></span>
        <span
          class="absolute bottom-3 left-3 rounded-full bg-black/60 px-3 py-1 text-xs font-semibold text-white backdrop-blur-sm"
        >
          ${index + 1}
        </span>
      `;
      button.addEventListener("click", function () {
        openAlbumLightbox(albumItems, index);
      });
      albumGrid.appendChild(button);
    });
    albumModal.classList.remove("hidden");
    albumModal.classList.add("flex");
    albumModal.setAttribute("aria-hidden", "false");
    document.body.classList.add("gallery-lightbox-open");
    requestAnimationFrame(function () {
      if (albumModalContent) {
        albumModalContent.classList.remove("scale-95", "opacity-0");
        albumModalContent.classList.add("scale-100", "opacity-100");
      }
    });
  }
  /* CLOSE ALBUM MODAL */
  function closeAlbumModal() {
    if (!albumModal) {
      return;
    }
    albumModal.classList.remove("flex");
    albumModal.classList.add("hidden");
    albumModal.setAttribute("aria-hidden", "true");
    if (albumGrid) {
      albumGrid.innerHTML = "";
    }
    currentAlbum = null;
    if (!lightbox || lightbox.classList.contains("hidden")) {
      document.body.classList.remove("gallery-lightbox-open");
    }
  }
  /* OPEN ALBUM LIGHTBOX */
  function openAlbumLightbox(albumItems, index) {
    if (!lightbox || !albumItems.length) {
      return;
    }
    lightboxMode = "photos";
    lightboxItems = albumItems;
    lightboxIndex = index >= 0 ? index : 0;
    closeAlbumModal();
    renderLightbox();
    lightbox.classList.remove("hidden");
    requestAnimationFrame(function () {
      lightbox.classList.remove("opacity-0");
    });
    lightbox.setAttribute("aria-hidden", "false");
    document.body.classList.add("gallery-lightbox-open");
  }
  /* OPEN VIDEO LIGHTBOX */
  function openVideoLightbox(item) {
    if (!lightbox || !item) {
      return;
    }
    const videos = getVideoItems();
    if (!videos.length) {
      return;
    }
    lightboxMode = "videos";
    lightboxItems = videos;
    const index = videos.indexOf(item);
    lightboxIndex = index >= 0 ? index : 0;
    /*
     * Open the lightbox first.
     * This ensures the video element is visible
     * before playback starts.
     */
    lightbox.classList.remove("hidden");
    lightbox.setAttribute("aria-hidden", "false");
    document.body.classList.add("gallery-lightbox-open");
    /* Render the selected video.*/
    renderLightbox();
    /* Fade in the lightbox.*/
    requestAnimationFrame(function () {
      lightbox.classList.remove("opacity-0");
    });
  }
  /* RENDER LIGHTBOX */
  function renderLightbox() {
    if (!lightboxItems.length || !lightboxImage || !lightboxVideo) {
      return;
    }
    const item = lightboxItems[lightboxIndex];
    if (!item) {
      return;
    }
    const image = item.dataset.galleryImage || "";
    const video = item.dataset.galleryVideo || "";
    const title = item.dataset.galleryTitle || "Satori Adventures Gallery";
    const thumbnail = item.querySelector("img");
    /* Reset current media.*/
    lightboxImage.classList.add("hidden");
    lightboxVideo.classList.add("hidden");
    lightboxVideo.pause();
    lightboxVideo.currentTime = 0;
    lightboxVideo.removeAttribute("src");
    lightboxVideo.load();
    /* VIDEO*/
    if (lightboxMode === "videos" && video) {
      /* Set the actual video URL from data-gallery-video.*/
      lightboxVideo.src = video;
      /* Make the video visible.*/
      lightboxVideo.classList.remove("hidden");
      /* Load the selected video.*/
      lightboxVideo.load();
      const playPromise = lightboxVideo.play();
      if (playPromise !== undefined) {
        playPromise.catch(function (error) {
          console.warn("Video autoplay was blocked:", error);
        });
      }
    } else {
      /* IMAGE*/
      lightboxImage.src = image;
      lightboxImage.alt = thumbnail?.alt || title;
      lightboxImage.classList.remove("hidden");
    }
    /* TITLE*/
    if (lightboxTitle) {
      lightboxTitle.textContent = title;
    }
    /* COUNTER */
    if (lightboxCounter) {
      lightboxCounter.textContent = `${lightboxIndex + 1} / ${lightboxItems.length}`;
    }
    /* PREVIOUS / NEXT*/
    const onlyOne = lightboxItems.length <= 1;
    lightboxPrev.disabled = onlyOne;
    lightboxNext.disabled = onlyOne;
    lightboxPrev.classList.toggle("opacity-40", onlyOne);
    lightboxNext.classList.toggle("opacity-40", onlyOne);
  }
  /* CLOSE LIGHTBOX */
  function closeLightbox() {
    if (!lightbox) {
      return;
    }
    lightbox.classList.add("opacity-0");
    /* Completely stop and reset video.*/
    if (lightboxVideo) {
      lightboxVideo.pause();
      lightboxVideo.currentTime = 0;
      lightboxVideo.removeAttribute("src");
      lightboxVideo.load();
      lightboxVideo.classList.add("hidden");
    }
    window.setTimeout(function () {
      lightbox.classList.add("hidden");
      lightbox.setAttribute("aria-hidden", "true");
      if (lightboxImage) {
        lightboxImage.src = "";
      }
      if (lightboxTitle) {
        lightboxTitle.textContent = "";
      }
      if (lightboxCounter) {
        lightboxCounter.textContent = "";
      }
      lightboxItems = [];
      lightboxIndex = 0;
      lightboxMode = null;
      currentAlbum = null;
      document.body.classList.remove("gallery-lightbox-open");
    }, 250);
  }
  /* PREVIOUS */
  function showPrevious() {
    if (lightboxItems.length <= 1) {
      return;
    }
    lightboxIndex =
      lightboxIndex <= 0 ? lightboxItems.length - 1 : lightboxIndex - 1;
    renderLightbox();
  }
  /* NEXT */
  function showNext() {
    if (lightboxItems.length <= 1) {
      return;
    }
    lightboxIndex =
      lightboxIndex >= lightboxItems.length - 1 ? 0 : lightboxIndex + 1;
    renderLightbox();
  }
  /* MAIN TABS */
  mainTabs.forEach(function (button) {
    button.addEventListener("click", function () {
      activeGalleryType = this.dataset.galleryType || "photos";
      updateMainTabs(this);
      if (activeGalleryType === "past-trips") {
        if (galleryGrid) {
          galleryGrid.classList.add("hidden");
        }
        if (categoryBar) {
          categoryBar.classList.add("hidden");
        }
        if (galleryTools) {
          galleryTools.classList.add("hidden");
        }
        if (pagination) {
          pagination.classList.add("hidden");
        }
        if (pastTripsSection) {
          pastTripsSection.classList.remove("hidden");
        }
      } else {
        if (galleryGrid) {
          galleryGrid.classList.remove("hidden");
        }
        if (categoryBar) {
          categoryBar.classList.remove("hidden");
        }
        if (galleryTools) {
          galleryTools.classList.remove("hidden");
        }
        if (pagination) {
          pagination.classList.remove("hidden");
        }
        if (pastTripsSection) {
          pastTripsSection.classList.add("hidden");
        }
        filterGallery();
      }
      this.scrollIntoView({
        behavior: "smooth",
        block: "nearest",
        inline: "center",
      });
    });
  });
  /* CATEGORY FILTERS */
  categoryFilters.forEach(function (button) {
    button.addEventListener("click", function () {
      activeCategory = this.dataset.galleryCategory || "recent";
      updateCategoryButtons(this);
      filterGallery();
      this.scrollIntoView({
        behavior: "smooth",
        block: "nearest",
        inline: "center",
      });
    });
  });
  /* SEARCH */
  if (searchInput) {
    searchInput.addEventListener("input", function () {
      activeSearch = this.value;
      filterGallery();
    });
  }
  /* SORT */
  if (sortSelect) {
    sortSelect.addEventListener("change", function () {
      activeSort = this.value;
      sortGallery();
      sortPastTrips();
      filterGallery();
    });
  }
  /* PHOTO ALBUM CLICK */
  galleryPage
    .querySelectorAll(
      ".gallery-media-item[data-gallery-type='photos'] .gallery-open",
    )
    .forEach(function (button) {
      button.addEventListener("click", function (event) {
        event.preventDefault();
        const item = this.closest(".gallery-media-item");
        if (item) {
          openAlbumModal(item);
        }
      });
    });
  /* VIDEO CLICK */
  galleryPage
    .querySelectorAll(
      ".gallery-media-item[data-gallery-type='videos'] .gallery-open",
    )
    .forEach(function (button) {
      button.addEventListener("click", function (event) {
        event.preventDefault();
        const item = this.closest(".gallery-media-item");
        if (item) {
          openVideoLightbox(item);
        }
      });
    });
  /* ALBUM CLOSE */
  if (albumClose) {
    albumClose.addEventListener("click", closeAlbumModal);
  }
  if (albumModal) {
    albumModal.addEventListener("click", function (event) {
      if (event.target === albumModal) {
        closeAlbumModal();
      }
    });
  }
  /* LIGHTBOX CLOSE */
  if (lightboxClose) {
    lightboxClose.addEventListener("click", closeLightbox);
  }
  /* LIGHTBOX PREVIOUS */
  if (lightboxPrev) {
    lightboxPrev.addEventListener("click", function (event) {
      event.preventDefault();
      showPrevious();
    });
  }
  /* LIGHTBOX NEXT */
  if (lightboxNext) {
    lightboxNext.addEventListener("click", function (event) {
      event.preventDefault();
      showNext();
    });
  }
  /* LIGHTBOX OUTSIDE CLICK */
  if (lightbox) {
    lightbox.addEventListener("click", function (event) {
      if (event.target === lightbox) {
        closeLightbox();
      }
    });
  }
  /* KEYBOARD CONTROLS */
  document.addEventListener("keydown", function (event) {
    const albumOpen = albumModal && !albumModal.classList.contains("hidden");
    const lightboxOpen = lightbox && !lightbox.classList.contains("hidden");
    if (!albumOpen && !lightboxOpen) {
      return;
    }
    /* ESCAPE*/
    if (event.key === "Escape") {
      event.preventDefault();
      if (lightboxOpen) {
        closeLightbox();
        return;
      }
      if (albumOpen) {
        closeAlbumModal();
        return;
      }
    }
    /* PREVIOUS*/
    if (lightboxOpen && event.key === "ArrowLeft") {
      event.preventDefault();
      showPrevious();
      return;
    }
    /* NEXT*/
    if (lightboxOpen && event.key === "ArrowRight") {
      event.preventDefault();
      showNext();
    }
  });
  /* DEFAULT STATE */
  const defaultMainTab = galleryPage.querySelector(
    '.gallery-main-tab[data-gallery-type="photos"]',
  );
  const defaultCategory = galleryPage.querySelector(
    '.gallery-category-filter[data-gallery-category="recent"]',
  );
  if (defaultMainTab) {
    updateMainTabs(defaultMainTab);
  }
  if (defaultCategory) {
    updateCategoryButtons(defaultCategory);
  }
  sortGallery();
  sortPastTrips();
  filterGallery();
});
document.addEventListener("DOMContentLoaded", function () {
  //FAQ Starts
  const faqPage = document.querySelector(".satori-faq-page");
  if (!faqPage) {
    return;
  }
  const faqItems = faqPage.querySelectorAll("[data-faq-item]");
  const faqQuestions = faqPage.querySelectorAll(".faq-question");
  const tocLinks = faqPage.querySelectorAll(".faq-toc-link");
  const relatedSearch = faqPage.querySelector("#related-faq-search");
  const relatedSort = faqPage.querySelector("#related-faq-sort");
  const relatedGrid = faqPage.querySelector("#related-faq-grid");
  const relatedCards = faqPage.querySelectorAll("[data-related-faq]");
  const relatedEmpty = faqPage.querySelector("#related-faq-empty");
  const toggleAllButton = faqPage.querySelector("#faq-toggle-all");
  // FAQ ACCORDION
  function openFaq(item) {
    const question = item.querySelector(".faq-question");
    const answer = item.querySelector(".faq-answer");
    const icon = item.querySelector(".faq-icon");
    if (!question || !answer) {
      return;
    }
    question.setAttribute("aria-expanded", "true");
    answer.classList.remove("hidden");
    if (icon) {
      icon.classList.add("rotate-180");
    }
  }
  function closeFaq(item) {
    const question = item.querySelector(".faq-question");
    const answer = item.querySelector(".faq-answer");
    const icon = item.querySelector(".faq-icon");
    if (!question || !answer) {
      return;
    }
    question.setAttribute("aria-expanded", "false");
    answer.classList.add("hidden");
    if (icon) {
      icon.classList.remove("rotate-180");
    }
  }
  // SINGLE FAQ TOGGLE - KEEP EXISTING BEHAVIOUR
  function toggleFaq(item) {
    const question = item.querySelector(".faq-question");
    if (!question) {
      return;
    }
    const isCurrentlyOpen = question.getAttribute("aria-expanded") === "true";
    if (isCurrentlyOpen) {
      closeFaq(item);
    } else {
      openFaq(item);
    }
  }
  // OPEN ALL / CLOSE ALL BUTTON
  function getAccordionItems() {
    return Array.from(faqItems).filter(function (item) {
      return item.querySelector(".faq-question");
    });
  }
  function areAllFaqsOpen() {
    const accordionItems = getAccordionItems();
    if (accordionItems.length === 0) {
      return false;
    }
    return accordionItems.every(function (item) {
      const question = item.querySelector(".faq-question");
      return question && question.getAttribute("aria-expanded") === "true";
    });
  }
  function updateToggleAllButton() {
    if (!toggleAllButton) {
      return;
    }
    const allOpen = areAllFaqsOpen();
    const icon = toggleAllButton.querySelector("i");
    const text = toggleAllButton.querySelector("span");
    toggleAllButton.setAttribute("aria-expanded", allOpen ? "true" : "false");
    if (text) {
      text.textContent = allOpen ? "Close All" : "Open All";
    }
    if (icon) {
      icon.classList.toggle("fa-angles-down", !allOpen);
      icon.classList.toggle("fa-angles-up", allOpen);
    }
  }
  if (toggleAllButton) {
    toggleAllButton.addEventListener("click", function (event) {
      event.preventDefault();
      event.stopPropagation();
      const accordionItems = getAccordionItems();
      if (accordionItems.length === 0) {
        return;
      }
      const closeAll = areAllFaqsOpen();
      accordionItems.forEach(function (item) {
        if (closeAll) {
          closeFaq(item);
        } else {
          openFaq(item);
        }
      });
      updateToggleAllButton();
    });
  }
  // QUESTION EVENTS
  faqQuestions.forEach(function (question) {
    question.addEventListener("click", function () {
      const item = this.closest("[data-faq-item]");
      if (!item) {
        return;
      }
      toggleFaq(item);
      /* Update master button after individual FAQ changes.*/
      updateToggleAllButton();
    });
  });
  // TOC NAVIGATION
  tocLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      const targetId = this.dataset.faqTarget;
      if (!targetId) {
        return;
      }
      const target = faqPage.querySelector("#" + targetId);
      if (!target) {
        return;
      }
      if (target.querySelector(".faq-question")) {
        openFaq(target);
      }
      /* Keep master button state synchronized. */
      updateToggleAllButton();
      /* Smooth scroll.*/
      const offset = 90;
      const targetPosition =
        target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({
        top: targetPosition,
        behavior: "smooth",
      });
      /* Active TOC state */
      tocLinks.forEach(function (toc) {
        toc.classList.remove("bg-white", "text-[#006f9d]");

        const icon = toc.querySelector(".faq-toc-icon");
        if (icon) {
          icon.classList.remove("text-white");
        }
      });

      this.classList.add("bg-white", "text-[#006f9d]");

      const activeIcon = this.querySelector(".faq-toc-icon");
      if (activeIcon) {
        activeIcon.classList.add("text-white");
      }
    });
  });
  // TOC INTERSECTION OBSERVER
  const tocObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) {
          return;
        }
        const id = entry.target.id;
        tocLinks.forEach(function (link) {
          const isActive = link.dataset.faqTarget === id;
          const icon = link.querySelector(".faq-toc-icon");

          link.classList.toggle("bg-[var(--teal-brand)]", isActive);
          link.classList.toggle("text-white", isActive);

          if (icon) {
            icon.classList.toggle("text-white", isActive);
            icon.classList.toggle("text-[var(--text-primary)]", !isActive);
          }
        });
      });
    },

    {
      rootMargin: "-100px 0px -55% 0px",
    },
  );
  faqItems.forEach(function (item) {
    tocObserver.observe(item);
  });
  // RELATED FAQ FILTER
  function filterRelatedFaqs() {
    const search = relatedSearch
      ? relatedSearch.value.trim().toLowerCase()
      : "";
    let visibleCount = 0;
    relatedCards.forEach(function (card) {
      const title = card.dataset.title || "";
      const category = card.dataset.category || "";
      const matches =
        search === "" || title.includes(search) || category.includes(search);
      card.classList.toggle("hidden", !matches);
      if (matches) {
        visibleCount++;
      }
    });
    if (relatedEmpty) {
      relatedEmpty.classList.toggle("hidden", visibleCount > 0);
    }
  }
  // RELATED FAQ SORT
  function sortRelatedFaqs() {
    if (!relatedGrid) {
      return;
    }
    const cards = Array.from(relatedCards);
    cards.sort(function (a, b) {
      const dateA = a.dataset.date || "";
      const dateB = b.dataset.date || "";
      const titleA = a.dataset.title || "";
      const titleB = b.dataset.title || "";
      switch (relatedSort ? relatedSort.value : "default") {
        case "newest":
          return dateB.localeCompare(dateA);
        case "oldest":
          return dateA.localeCompare(dateB);
        case "az":
          return titleA.localeCompare(titleB);
        default:
          return 0;
      }
    });
    cards.forEach(function (card) {
      relatedGrid.appendChild(card);
    });
  }
  // RELATED SEARCH
  if (relatedSearch) {
    relatedSearch.addEventListener("input", function () {
      filterRelatedFaqs();
    });
  }
  // RELATED SORT
  if (relatedSort) {
    relatedSort.addEventListener("change", function () {
      sortRelatedFaqs();
      filterRelatedFaqs();
    });
  }
  // ESCAPE KEY - KEEP EXISTING BEHAVIOUR
  document.addEventListener("keydown", function (event) {
    if (event.key !== "Escape") {
      return;
    }
    faqItems.forEach(function (item) {
      /*
       * FAQ 01 is featured and should remain visible.
       */
      if (item.classList.contains("faq-item-featured")) {
        return;
      }
      closeFaq(item);
    });
    updateToggleAllButton();
  });
  /*INITIAL STATE
   * FAQ 01 remains open.
   * Featured FAQ has no accordion button.
   */
  const firstFaq = faqPage.querySelector("#faq-01");
  if (firstFaq) {
    firstFaq.classList.add("ring-1", "ring-[#c5e0eb]");
  }
  /* Synchronize Open All button with initial state.*/
  updateToggleAllButton();
  // RELATED FAQ INITIAL STATE
  sortRelatedFaqs();
  filterRelatedFaqs();
  //FAQ ends
});

document.addEventListener("DOMContentLoaded", function () {
  //Trip Form basic - Remove it's unnecessary.
  const planTripForm = document.getElementById("plan-trip-form");
  if (!planTripForm) {
    return;
  }
  const arrivalDate = document.getElementById("plan-arrival-date");
  const departureDate = document.getElementById("plan-departure-date");
  const message = document.getElementById("plan-trip-message");
  function showPlanTripMessage(text, type) {
    if (!message) {
      return;
    }
    message.textContent = text;
    message.classList.remove(
      "hidden",
      "bg-red-50",
      "text-red-700",
      "bg-green-50",
      "text-green-700",
    );
    if (type === "success") {
      message.classList.add("bg-green-50", "text-green-700");
    } else {
      message.classList.add("bg-red-50", "text-red-700");
    }
  }
  /* Set Minimum Departure Date*/
  if (arrivalDate && departureDate) {
    arrivalDate.addEventListener("change", function () {
      if (!this.value) {
        departureDate.removeAttribute("min");
        return;
      }
      departureDate.min = this.value;
      if (departureDate.value && departureDate.value < this.value) {
        departureDate.value = "";
      }
    });
  }
  /* Plan Your Trip Form */
  planTripForm.addEventListener("submit", function (event) {
    event.preventDefault();
    if (!planTripForm.checkValidity()) {
      planTripForm.reportValidity();
      showPlanTripMessage(
        "Please complete all required fields before submitting your trip request.",
        "error",
      );
      return;
    }
    if (
      arrivalDate &&
      departureDate &&
      arrivalDate.value &&
      departureDate.value &&
      departureDate.value < arrivalDate.value
    ) {
      showPlanTripMessage(
        "Departure date must be after the arrival date.",
        "error",
      );
      departureDate.focus();
      return;
    }
    /* CAPTCHA*/
    const captcha = document.getElementById("plan-captcha");
    if (captcha && !captcha.checked) {
      showPlanTripMessage("Please confirm that you are not a robot.", "error");
      captcha.focus();
      return;
    }
    showPlanTripMessage(
      "Your trip planning request has been submitted successfully. Our team will contact you shortly.",
      "success",
    );
  });
});
/* SATORI PACKAGE DETAIL PAGE */
document.addEventListener("DOMContentLoaded", function () {
  const packagePage = document.getElementById("package-title");
  if (!packagePage) {
    return;
  }
  /* SMOOTH PACKAGE NAVIGATION */
  const packageNavLinks = document.querySelectorAll(".package-nav-link");
  packageNavLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      const targetId = this.getAttribute("href");
      if (!targetId || targetId.charAt(0) !== "#") {
        return;
      }
      const target = document.querySelector(targetId);
      if (!target) {
        return;
      }
      event.preventDefault();
      const navigation = document.getElementById("package-navigation");
      const navigationHeight = navigation ? navigation.offsetHeight : 0;
      const mainNav = document.querySelector('nav[aria-label="Main Navigation"]');
      const mainNavHeight = mainNav ? mainNav.offsetHeight : 0;
      const targetPosition =
        target.getBoundingClientRect().top +
        window.scrollY -
        (navigationHeight + mainNavHeight) -
        12;
      window.scrollTo({
        top: targetPosition,
        behavior: "smooth",
      });
    });
  });
  /* ACTIVE PACKAGE NAVIGATION */
  const packageSections = document.querySelectorAll(
    "#trip-facts, #overview, #route, #itinerary, #costs, #gallery, #departure, #faq, #reviews",
  );
  const updatePackageNavigation = function () {
    const navigation = document.getElementById("package-navigation");
    if (!navigation) {
      return;
    }
    const mainNav = document.querySelector('nav[aria-label="Main Navigation"]');
    const mainNavHeight = mainNav ? mainNav.offsetHeight : 0;
    const totalNavHeight = navigation.offsetHeight + mainNavHeight;
    let activeSection = "";
    packageSections.forEach(function (section) {
      const sectionTop =
        section.getBoundingClientRect().top - totalNavHeight - 80;
      if (sectionTop <= 0) {
        activeSection = section.id;
      }
    });
    packageNavLinks.forEach(function (link) {
      const href = link.getAttribute("href");
      link.classList.remove(
        "border-[var(--teal-border)]",
        "bg-white/10",
        "text-white",
      );
      link.classList.add("border-transparent");
      if (href === "#" + activeSection) {
        link.classList.remove("border-transparent");
        link.classList.add(
          "border-[var(--teal-border)]",
          "bg-white/10",
          "text-white",
        );
      }
    });
  };
  window.addEventListener("scroll", updatePackageNavigation, {
    passive: true,
  });
  updatePackageNavigation();
  /*OVERVIEW READ MORE */
  const overviewReadMoreButton = document.getElementById("overview-read-more");
  if (overviewReadMoreButton) {
    const overviewMoreContent = document.getElementById(
      "overview-more-content",
    );
    const overviewReadMoreText = document.getElementById(
      "overview-read-more-text",
    );
    const overviewReadMoreIcon = document.getElementById(
      "overview-read-more-icon",
    );
    overviewReadMoreButton.addEventListener("click", function () {
      const isExpanded = this.getAttribute("aria-expanded") === "true";
      if (isExpanded) {
        /* Close */
        this.setAttribute("aria-expanded", "false");
        overviewMoreContent.classList.remove("grid-rows-[1fr]", "opacity-100");
        overviewMoreContent.classList.add("grid-rows-[0fr]", "opacity-0");
        overviewReadMoreText.textContent = "READ MORE";
        overviewReadMoreIcon.classList.remove("rotate-180");
      } else {
        /* Open */
        this.setAttribute("aria-expanded", "true");
        overviewMoreContent.classList.remove("grid-rows-[0fr]", "opacity-0");
        overviewMoreContent.classList.add("grid-rows-[1fr]", "opacity-100");
        overviewReadMoreText.textContent = "READ LESS";
        overviewReadMoreIcon.classList.add("rotate-180");
      }
    });
  }
  /*ITINERARY TABS */
  const satoriItineraryTabs = document.querySelectorAll(".itinerary-tab");
  const satoriItineraryPanels = document.querySelectorAll(".itinerary-panel");
  if (satoriItineraryTabs.length && satoriItineraryPanels.length) {
    satoriItineraryTabs.forEach(function (tab) {
      tab.addEventListener("click", function () {
        const selectedItinerary = this.dataset.itineraryTab;
        // Reset all tabs
        satoriItineraryTabs.forEach(function (button) {
          button.classList.remove("bg-[var(--blog-blue-bg)]");
          button.classList.add("bg-transparent");
          button.setAttribute("aria-selected", "false");
        });
        // Activate selected tab
        this.classList.remove("bg-transparent");
        this.classList.add("bg-[var(--blog-blue-bg)]");
        this.setAttribute("aria-selected", "true");
        // Hide all panels
        satoriItineraryPanels.forEach(function (panel) {
          panel.classList.add("hidden");
        });

        // Show selected panel inside the currently visible season
        const activeSeasonPanel = document.querySelector(
          ".season-panel:not(.hidden)",
        );

        const selectedPanel = activeSeasonPanel
          ? activeSeasonPanel.querySelector(
              `.itinerary-panel[data-itinerary-panel="${selectedItinerary}"]`,
            )
          : null;

        if (selectedPanel) {
          selectedPanel.classList.remove("hidden");
        }
      });
    });
  }
  /* ITINERARY EXPAND ALL */
  const itineraryExpandAllButton = document.getElementById(
    "itinerary-expand-all",
  );

  const itineraryExpandAllText = document.getElementById(
    "itinerary-expand-all-text",
  );

  if (itineraryExpandAllButton && itineraryExpandAllText) {
    const updateExpandAllButton = function () {
      const visiblePanel = document.querySelector(
        ".season-panel:not(.hidden) .itinerary-panel:not(.hidden)",
      );

      if (!visiblePanel) {
        return;
      }

      const details = visiblePanel.querySelectorAll(".itinerary-details");

      if (!details.length) {
        return;
      }

      const allExpanded = Array.from(details).every(function (detail) {
        return (
          detail.style.maxHeight !== "0px" && detail.style.maxHeight !== ""
        );
      });

      itineraryExpandAllButton.setAttribute(
        "aria-expanded",
        allExpanded ? "true" : "false",
      );

      itineraryExpandAllText.textContent = allExpanded
        ? "− Collapse All"
        : "+ Expand All";

      itineraryExpandAllButton.setAttribute(
        "aria-label",
        allExpanded
          ? "Collapse all itinerary days"
          : "Expand all itinerary days",
      );
    };

    /* ITINERARY SEASON TABS */
    const satoriSeasonTabs = document.querySelectorAll(".season-tab");
    const satoriSeasonPanels = document.querySelectorAll(".season-panel");

    if (satoriSeasonTabs.length && satoriSeasonPanels.length) {
      const resetSeasonItinerary = function (seasonPanel) {
        if (!seasonPanel) {
          return;
        }

        /* Show Itinerary 1 and hide all other itineraries */
        const itineraryPanels =
          seasonPanel.querySelectorAll(".itinerary-panel");

        itineraryPanels.forEach(function (panel, index) {
          if (index === 0) {
            panel.classList.remove("hidden");
          } else {
            panel.classList.add("hidden");
          }
        });

        /* Reset all itinerary days */
        const itineraryItems = seasonPanel.querySelectorAll(".itinerary-item");

        itineraryItems.forEach(function (item, index) {
          const details = item.querySelector(".itinerary-details");
          const toggle = item.querySelector(".itinerary-toggle");
          const arrow = item.querySelector(".itinerary-arrow");

          if (!details || !toggle || !arrow) {
            return;
          }

          if (index === 0) {
            /* DAY 01 OPEN */
            details.style.maxHeight = "1000px";
            details.style.opacity = "1";

            toggle.setAttribute("aria-expanded", "true");
            arrow.classList.add("rotate-180");
          } else {
            /* ALL OTHER DAYS CLOSED */
            details.style.maxHeight = "0px";
            details.style.opacity = "0";

            toggle.setAttribute("aria-expanded", "false");
            arrow.classList.remove("rotate-180");
          }
        });
      };

      satoriSeasonTabs.forEach(function (tab) {
        tab.addEventListener("click", function () {
          const selectedSeason = this.dataset.season;

          /* Reset season tab appearance */
          satoriSeasonTabs.forEach(function (button) {
            button.classList.remove("bg-[#2D628F]", "text-white");

            button.classList.add("bg-[#F1F7FA]", "text-[var(--figma-blue)]");

            button.setAttribute("aria-selected", "false");
          });

          /* Activate selected season */
          this.classList.remove("bg-[#F1F7FA]", "text-[var(--figma-blue)]");

          this.classList.add("bg-[#2D628F]", "text-white");

          this.setAttribute("aria-selected", "true");

          /* Hide all seasons */
          satoriSeasonPanels.forEach(function (panel) {
            panel.classList.add("hidden");
          });

          /* Show selected season */
          const activeSeasonPanel = document.querySelector(
            '.season-panel[data-season-panel="' + selectedSeason + '"]',
          );

          if (!activeSeasonPanel) {
            return;
          }

          activeSeasonPanel.classList.remove("hidden");

          /* Always reset to Itinerary 1 + Day 01 open */
          resetSeasonItinerary(activeSeasonPanel);

          /* Reset itinerary tabs to Itinerary 1 */
          const itineraryTabs = document.querySelectorAll(".itinerary-tab");

          itineraryTabs.forEach(function (button, index) {
            button.classList.remove("bg-[var(--blog-blue-bg)]");
            button.classList.add("bg-transparent");
            button.setAttribute("aria-selected", "false");

            if (index === 0) {
              button.classList.remove("bg-transparent");
              button.classList.add("bg-[var(--blog-blue-bg)]");
              button.setAttribute("aria-selected", "true");
            }
          });

          /* Update Expand All button */
          if (itineraryExpandAllButton && itineraryExpandAllText) {
            itineraryExpandAllButton.setAttribute("aria-expanded", "false");

            itineraryExpandAllText.textContent = "+ Expand All";

            itineraryExpandAllButton.setAttribute(
              "aria-label",
              "Expand all itinerary days",
            );
          }
        });
      });
    }

    itineraryExpandAllButton.addEventListener("click", function () {
      const visiblePanel = document.querySelector(
        ".season-panel:not(.hidden) .itinerary-panel:not(.hidden)",
      );

      if (!visiblePanel) {
        return;
      }

      const details = visiblePanel.querySelectorAll(".itinerary-details");
      const toggles = visiblePanel.querySelectorAll(".itinerary-toggle");
      const arrows = visiblePanel.querySelectorAll(".itinerary-arrow");

      const shouldExpand = this.getAttribute("aria-expanded") !== "true";

      details.forEach(function (detail) {
        detail.style.maxHeight = shouldExpand ? "1000px" : "0px";
        detail.style.opacity = shouldExpand ? "1" : "0";
      });

      toggles.forEach(function (toggle) {
        toggle.setAttribute("aria-expanded", shouldExpand ? "true" : "false");
      });

      arrows.forEach(function (arrow) {
        arrow.classList.toggle("rotate-180", shouldExpand);
      });

      this.setAttribute("aria-expanded", shouldExpand ? "true" : "false");

      itineraryExpandAllText.textContent = shouldExpand
        ? "− Collapse All"
        : "+ Expand All";

      this.setAttribute(
        "aria-label",
        shouldExpand
          ? "Collapse all itinerary days"
          : "Expand all itinerary days",
      );
    });

    /*
     * Keep the button state correct when
     * itinerary/season tabs are changed.
     */
    const refreshExpandAllState = function () {
      setTimeout(updateExpandAllButton, 0);
    };

    document
      .querySelectorAll(".itinerary-tab, .season-tab")
      .forEach(function (tab) {
        tab.addEventListener("click", refreshExpandAllState);
      });

    updateExpandAllButton();
  }

  /* PACKAGE SERVICE TABS */
  const satoriPackageServiceTabs = document.querySelectorAll(
    ".package-service-tab",
  );
  const satoriPackageServicePanels = document.querySelectorAll(
    ".package-service-panel",
  );

  if (satoriPackageServiceTabs.length && satoriPackageServicePanels.length) {
    satoriPackageServiceTabs.forEach(function (tab) {
      tab.addEventListener("click", function () {
        const selectedService = this.dataset.packageService;
        /*RESET ALL TABS */
        satoriPackageServiceTabs.forEach(function (button) {
          button.classList.remove("bg-[var(--blog-blue-bg)]");
          button.classList.add("bg-transparent", "text-white");
          button.setAttribute("aria-selected", "false");
        });
        /* ACTIVATE SELECTED TAB */
        this.classList.remove("bg-transparent");
        this.classList.add("bg-[var(--blog-blue-bg)]", "text-white");
        this.setAttribute("aria-selected", "true");
        /*HIDE ALL PACKAGE PANELS */
        satoriPackageServicePanels.forEach(function (panel) {
          panel.classList.add("hidden");
        });
        /*SHOW SELECTED PACKAGE */
        const selectedPanel = document.querySelector(
          '.package-service-panel[data-package-panel="' +
            selectedService +
            '"]',
        );
        if (selectedPanel) {
          selectedPanel.classList.remove("hidden");
        }
      });
    });
  }
  /* PACKAGE FAQ ACCORDION */
  const packageFaqButtons = document.querySelectorAll(".package-faq-btn");
  packageFaqButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const currentItem = this.closest(".package-faq-item");
      const currentAnswer = currentItem
        ? currentItem.querySelector(".package-faq-answer")
        : null;
      const currentIcon = this.querySelector(".package-faq-icon");
      const isCurrentlyOpen = this.getAttribute("aria-expanded") === "true";
      /* CLOSE ALL FAQ ITEMS */
      document.querySelectorAll(".package-faq-item").forEach(function (item) {
        const faqButton = item.querySelector(".package-faq-btn");
        const answer = item.querySelector(".package-faq-answer");
        const icon = item.querySelector(".package-faq-icon");
        if (faqButton) {
          faqButton.setAttribute("aria-expanded", "false");
        }
        if (answer) {
          answer.classList.remove("grid-rows-[1fr]", "opacity-100");
          answer.classList.add("grid-rows-[0fr]", "opacity-0");
        }
        if (icon) {
          icon.classList.remove("rotate-180");
        }
        item.classList.remove("ring-1", "ring-[#8ac9dd]");
      });
      /* OPEN CURRENT FAQ */
      if (!isCurrentlyOpen && currentAnswer) {
        this.setAttribute("aria-expanded", "true");
        currentAnswer.classList.remove("grid-rows-[0fr]", "opacity-0");
        currentAnswer.classList.add("grid-rows-[1fr]", "opacity-100");
        if (currentIcon) {
          currentIcon.classList.add("rotate-180");
        }
        if (currentItem) {
          currentItem.classList.add("ring-1", "ring-[#8ac9dd]");
        }
      }
    });
  });
  /* GALLERY LIGHTBOX */
  const galleryItems = document.querySelectorAll(".package-gallery-item");
  galleryItems.forEach(function (item, index) {
    item.addEventListener("click", function (event) {
      event.preventDefault();
      const imageUrl = this.getAttribute("href");
      if (!imageUrl) {
        return;
      }
      let currentIndex = index;
      const overlay = document.createElement("div");
      overlay.className =
        "fixed inset-0 z-[100] flex items-center justify-center bg-black/90 p-5";
      overlay.innerHTML = `
            <!-- Previous -->
            <button
                type="button"
                class="package-lightbox-prev absolute left-4 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/70 sm:left-6"
                aria-label="Previous image">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <!-- Close -->
            <button
                type="button"
                class="package-lightbox-close absolute right-5 top-5 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-white transition-transform duration-300 hover:rotate-90 hover:bg-white/20"
                aria-label="Close image">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <!-- Image -->
            <img
                src="${imageUrl}"
                alt="Package gallery image"
                class="package-lightbox-image max-h-[90vh] max-w-[92vw] rounded-[4px] object-contain shadow-2xl">
            <!-- Next -->
            <button
                type="button"
                class="package-lightbox-next absolute right-4 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/70 sm:right-6"
                aria-label="Next image">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        `;
      document.body.appendChild(overlay);
      document.body.classList.add("overflow-hidden");
      const image = overlay.querySelector(".package-lightbox-image");
      const closeButton = overlay.querySelector(".package-lightbox-close");
      const prevButton = overlay.querySelector(".package-lightbox-prev");
      const nextButton = overlay.querySelector(".package-lightbox-next");
      /* Update the image without closing/recreating the lightbox.*/
      const updateImage = function () {
        const currentItem = galleryItems[currentIndex];
        const currentImageUrl = currentItem.getAttribute("href");
        const currentImage = currentItem.querySelector("img");
        if (!currentImageUrl) {
          return;
        }
        image.src = currentImageUrl;
        if (currentImage && currentImage.alt) {
          image.alt = currentImage.alt;
        }
      };
      /* Previous image*/
      const showPrevious = function (event) {
        event.stopPropagation();
        currentIndex--;
        if (currentIndex < 0) {
          currentIndex = galleryItems.length - 1;
        }
        updateImage();
      };
      /* Next image*/
      const showNext = function (event) {
        event.stopPropagation();
        currentIndex++;
        if (currentIndex >= galleryItems.length) {
          currentIndex = 0;
        }
        updateImage();
      };
      /* Close lightbox*/
      const closeLightbox = function () {
        overlay.remove();
        document.body.classList.remove("overflow-hidden");
        document.removeEventListener("keydown", escapeHandler);
      };
      closeButton.addEventListener("click", closeLightbox);
      prevButton.addEventListener("click", showPrevious);
      nextButton.addEventListener("click", showNext);
      /* Close when clicking outside the image.*/
      overlay.addEventListener("click", function (event) {
        if (event.target === overlay) {
          closeLightbox();
        }
      });
      const escapeHandler = function (event) {
        if (event.key === "Escape") {
          closeLightbox();
        }
        if (event.key === "ArrowLeft") {
          showPrevious(event);
        }
        if (event.key === "ArrowRight") {
          showNext(event);
        }
      };
      document.addEventListener("keydown", escapeHandler);
    });
  });
  /* TRAVELLERS STORIES SWIPER */
  const satoriTravellersStories = document.querySelector(
    ".travellers-stories-swiper",
  );
  if (satoriTravellersStories && typeof Swiper !== "undefined") {
    const satoriReviewPrev = document.querySelector(".review-prev");
    const satoriReviewNext = document.querySelector(".review-next");
    const satoriTravellersSwiper = new Swiper(satoriTravellersStories, {
      slidesPerView: 1,
      spaceBetween: 12,
      speed: 550,
      grabCursor: true,
      watchOverflow: true,
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
      navigation: {
        prevEl: satoriReviewPrev,
        nextEl: satoriReviewNext,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 14,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 16,
        },
      },
      on: {
        init: function () {
          satoriUpdateReviewNavigation(this);
        },
        slideChange: function () {
          satoriUpdateReviewNavigation(this);
        },
        resize: function () {
          satoriUpdateReviewNavigation(this);
        },
      },
    });
    /* UPDATE NAVIGATION BUTTONS */
    function satoriUpdateReviewNavigation(swiperInstance) {
      if (!satoriReviewPrev || !satoriReviewNext) {
        return;
      }
      satoriReviewPrev.disabled = swiperInstance.isBeginning;
      satoriReviewNext.disabled = swiperInstance.isEnd;
      satoriReviewPrev.setAttribute(
        "aria-disabled",
        swiperInstance.isBeginning ? "true" : "false",
      );
      satoriReviewNext.setAttribute(
        "aria-disabled",
        swiperInstance.isEnd ? "true" : "false",
      );
    }
  }
  /*TRAVELLER REVIEW MODAL */
  const satoriReviewModal = document.querySelector("#review-modal");
  const satoriOpenReviewModal = document.querySelector("#open-review-modal");
  const satoriCloseReviewModal = document.querySelector("#close-review-modal");
  const satoriCancelReviewModal = document.querySelector(
    "#cancel-review-modal",
  );
  const satoriReviewForm = document.querySelector("#traveller-review-form");
  const satoriReviewStars = document.querySelectorAll(".review-star");
  const satoriReviewRating = document.querySelector("#review-rating-value");
  const satoriReviewMessage = document.querySelector("#review-message");
  const satoriReviewCharacterCount = document.querySelector(
    "#review-character-count",
  );
  /* OPEN MODAL */
  function satoriOpenTravellerReviewModal() {
    if (!satoriReviewModal) {
      return;
    }
    satoriReviewModal.classList.remove("hidden");
    satoriReviewModal.setAttribute("aria-hidden", "false");
    document.body.classList.add("overflow-hidden");
    const firstInput = satoriReviewModal.querySelector(
      'input:not([type="hidden"]), textarea, select',
    );
    if (firstInput) {
      setTimeout(function () {
        firstInput.focus();
      }, 100);
    }
  }
  /* CLOSE MODAL */
  function satoriCloseTravellerReviewModal() {
    if (!satoriReviewModal) {
      return;
    }
    satoriReviewModal.classList.add("hidden");
    satoriReviewModal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("overflow-hidden");
  }
  /*OPEN BUTTON */
  if (satoriOpenReviewModal) {
    satoriOpenReviewModal.addEventListener(
      "click",
      satoriOpenTravellerReviewModal,
    );
  }
  /* CLOSE BUTTON */
  if (satoriCloseReviewModal) {
    satoriCloseReviewModal.addEventListener(
      "click",
      satoriCloseTravellerReviewModal,
    );
  }
  /*CANCEL BUTTON */
  if (satoriCancelReviewModal) {
    satoriCancelReviewModal.addEventListener(
      "click",
      satoriCloseTravellerReviewModal,
    );
  }
  /*CLICK OUTSIDE MODAL */
  if (satoriReviewModal) {
    satoriReviewModal.addEventListener("click", function (event) {
      if (event.target === satoriReviewModal) {
        satoriCloseTravellerReviewModal();
      }
    });
  }
  /*ESCAPE KEY */
  document.addEventListener("keydown", function (event) {
    if (
      event.key === "Escape" &&
      satoriReviewModal &&
      !satoriReviewModal.classList.contains("hidden")
    ) {
      satoriCloseTravellerReviewModal();
    }
  });
  /*STAR RATING */
  if (satoriReviewStars.length && satoriReviewRating) {
    satoriReviewStars.forEach(function (starButton) {
      starButton.addEventListener("click", function () {
        const selectedRating = Number(this.dataset.rating);
        satoriReviewRating.value = selectedRating;
        satoriReviewStars.forEach(function (button) {
          const buttonRating = Number(button.dataset.rating);
          const icon = button.querySelector("i");
          if (buttonRating <= selectedRating) {
            button.classList.remove("text-slate-300");
            button.classList.add("text-amber-500");
            button.setAttribute("aria-pressed", "true");
          } else {
            button.classList.remove("text-amber-500");
            button.classList.add("text-slate-300");
            button.setAttribute("aria-pressed", "false");
          }
          if (icon) {
            icon.classList.toggle("fa-star", true);
          }
        });
      });
    });
  }
  /*REVIEW CHARACTER COUNT */
  if (satoriReviewMessage && satoriReviewCharacterCount) {
    satoriReviewMessage.addEventListener("input", function () {
      const currentLength = this.value.length;
      const maximumLength = Number(this.getAttribute("maxlength")) || 3000;
      satoriReviewCharacterCount.textContent =
        currentLength + " / " + maximumLength;
    });
  }
  /*FORM SUBMISSION */
  if (satoriReviewForm) {
    satoriReviewForm.addEventListener("submit", function (event) {
      /*Temporary frontend handling.
       * Replace this later with your PHP/Laravel
       * review submission endpoint.*/
      event.preventDefault();
      const rating = satoriReviewRating ? Number(satoriReviewRating.value) : 0;
      if (rating < 1) {
        alert("Please select a rating before submitting your review.");
        return;
      }
      alert("Thank you for sharing your experience with Satori Adventures!");
    });
  }
  const printButton = document.getElementById("print-package-page");

  function updatePrintData() {
    const packageTitle = document.getElementById("package-title");
    const printTitle = document.getElementById("print-package-title");
    const printDate = document.getElementById("print-date");

    if (packageTitle && printTitle) {
      const titleText = packageTitle.textContent.trim();
      if (titleText) {
        printTitle.textContent = titleText;
      }
    }

    if (printDate) {
      const now = new Date();
      printDate.textContent = now.toLocaleDateString("en-US", {
        month: "short",
        day: "2-digit",
        year: "numeric",
      });
    }
  }

  if (printButton) {
    printButton.addEventListener("click", function () {
      updatePrintData();
      window.print();
    });
  }

  window.addEventListener("beforeprint", updatePrintData);
});
document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".package-gallery-swiper", {
    slidesPerView: 1.35,
    spaceBetween: 10,
    speed: 700,
    grabCursor: true,
    watchOverflow: true,
    navigation: {
      nextEl: ".package-gallery-next",
      prevEl: ".package-gallery-prev",
    },
    breakpoints: {
      640: {
        slidesPerView: 2.2,
        spaceBetween: 12,
      },
      768: {
        slidesPerView: 3.15,
        spaceBetween: 14,
      },
      1024: {
        slidesPerView: 4.15,
        spaceBetween: 16,
      },
      1280: {
        slidesPerView: 4.35,
        spaceBetween: 18,
      },
    },
  });
});
document.querySelectorAll(".faq-trigger").forEach((trigger) => {
  trigger.addEventListener("click", () => {
    const currentItem = trigger.closest(".faq-item");
    const currentContent = currentItem.querySelector(".faq-content");
    const currentIcon = currentItem.querySelector(".faq-icon");
    const isOpen = trigger.getAttribute("aria-expanded") === "true";
    document.querySelectorAll(".faq-item").forEach((item) => {
      const button = item.querySelector(".faq-trigger");
      const content = item.querySelector(".faq-content");
      const icon = item.querySelector(".faq-icon");
      button.setAttribute("aria-expanded", "false");
      content.classList.remove("grid-rows-[1fr]");
      content.classList.add("grid-rows-[0fr]");
      icon.classList.remove("rotate-180");
    });
    if (!isOpen) {
      trigger.setAttribute("aria-expanded", "true");
      currentContent.classList.remove("grid-rows-[0fr]");
      currentContent.classList.add("grid-rows-[1fr]");
      currentIcon.classList.add("rotate-180");
    }
  });
});
document.addEventListener("DOMContentLoaded", function () {
  const itinerary = document.querySelector("#itinerary");
  if (!itinerary) return;
  const seasonTabs = itinerary.querySelectorAll(".season-tab");
  const seasonPanels = itinerary.querySelectorAll(".season-panel");
  const itineraryTabsContainer = itinerary.querySelector("#itinerary-tabs");
  /* Create itinerary tabs according to selected season*/
  function createItineraryTabs(season) {
    const seasonPanel = itinerary.querySelector(
      `.season-panel[data-season-panel="${season}"]`,
    );
    if (!seasonPanel) return;
    const panels = seasonPanel.querySelectorAll(".itinerary-panel");
    itineraryTabsContainer.innerHTML = "";
    panels.forEach(function (panel, index) {
      const itineraryNumber = panel.getAttribute("data-itinerary-panel");
      const button = document.createElement("button");
      button.type = "button";
      button.id = `${season}-itinerary-tab-${itineraryNumber}`;
      button.className =
        "itinerary-tab flex h-[42px] min-w-[120px] flex-1 items-center justify-center rounded-[9px] px-4 text-[16px] sm:text-[18px] font-medium uppercase leading-none tracking-wide text-white transition-all duration-200 sm:min-w-0 sm:flex-none sm:px-6";
      button.setAttribute("data-itinerary-tab", itineraryNumber);
      button.setAttribute("role", "tab");
      button.setAttribute("aria-controls", panel.id);
      const isActive = index === 0;
      button.setAttribute("aria-selected", isActive ? "true" : "false");
      button.textContent = `ITINERARY ${itineraryNumber}`;
      if (isActive) {
        button.style.backgroundColor = "var(--blog-blue-bg)";
        panel.classList.remove("hidden");
      } else {
        button.style.backgroundColor = "transparent";
        panel.classList.add("hidden");
      }
      itineraryTabsContainer.appendChild(button);
    });
    attachItineraryTabEvents();
  }
  /* Season selection */
  seasonTabs.forEach(function (seasonTab) {
    seasonTab.addEventListener("click", function () {
      const selectedSeason = seasonTab.getAttribute("data-season");
      /* Update season button design */
      seasonTabs.forEach(function (tab) {
        const isActive = tab.getAttribute("data-season") === selectedSeason;
        tab.setAttribute("aria-selected", isActive ? "true" : "false");
        if (isActive) {
          tab.classList.remove("bg-[#F1F7FA]", "text-[var(--figma-blue)]");
          tab.classList.add("bg-[#2D628F]", "text-white");
        } else {
          tab.classList.remove("bg-[#2D628F]", "text-white");
          tab.classList.add("bg-[#F1F7FA]", "text-[var(--figma-blue)]");
        }
      });
      /* Show selected season */
      seasonPanels.forEach(function (panel) {
        const panelSeason = panel.getAttribute("data-season-panel");
        if (panelSeason === selectedSeason) {
          panel.classList.remove("hidden");
        } else {
          panel.classList.add("hidden");
        }
      });
      /* Create only the itinerary buttons - belonging to this season */
      createItineraryTabs(selectedSeason);
    });
  });
  /* Itinerary tab selection */
  function attachItineraryTabEvents() {
    const itineraryTabs =
      itineraryTabsContainer.querySelectorAll(".itinerary-tab");
    itineraryTabs.forEach(function (tab) {
      tab.addEventListener("click", function () {
        const selectedItinerary = tab.getAttribute("data-itinerary-tab");
        itineraryTabs.forEach(function (otherTab) {
          const isActive = otherTab === tab;
          otherTab.setAttribute("aria-selected", isActive ? "true" : "false");
          if (isActive) {
            otherTab.style.backgroundColor = "var(--blog-blue-bg)";
          } else {
            otherTab.style.backgroundColor = "transparent";
          }
        });
        const activeSeasonPanel = itinerary.querySelector(
          ".season-panel:not(.hidden)",
        );
        if (!activeSeasonPanel) return;
        const itineraryPanels =
          activeSeasonPanel.querySelectorAll(".itinerary-panel");
        itineraryPanels.forEach(function (panel) {
          const panelItinerary = panel.getAttribute("data-itinerary-panel");
          if (panelItinerary === selectedItinerary) {
            panel.classList.remove("hidden");
            resetOpenItem(panel);
          } else {
            panel.classList.add("hidden");
          }
        });
      });
    });
  }
  /* Keep first item open when switching itinerary */
  function resetOpenItem(panel) {
    const items = panel.querySelectorAll(".itinerary-item");
    items.forEach(function (item, index) {
      const toggle = item.querySelector(".itinerary-toggle");
      const details = item.querySelector(".itinerary-details");
      const arrow = item.querySelector(".itinerary-arrow");
      if (!toggle || !details || !arrow) return;
      if (index === 0) {
        toggle.setAttribute("aria-expanded", "true");
        details.style.maxHeight = details.scrollHeight + "px";
        details.style.opacity = "1";
        arrow.classList.add("rotate-180");
      } else {
        toggle.setAttribute("aria-expanded", "false");
        details.style.maxHeight = "0px";
        details.style.opacity = "0";
        arrow.classList.remove("rotate-180");
      }
    });
  }
  /* Day accordion */
  function initializeAccordion() {
    const items = itinerary.querySelectorAll(".itinerary-item");
    items.forEach(function (item) {
      const toggle = item.querySelector(".itinerary-toggle");
      const details = item.querySelector(".itinerary-details");
      const arrow = item.querySelector(".itinerary-arrow");
      if (!toggle || !details || !arrow) return;
      if (toggle.getAttribute("aria-expanded") === "true") {
        details.style.maxHeight = details.scrollHeight + "px";
      }
      toggle.addEventListener("click", function () {
        const isOpen = toggle.getAttribute("aria-expanded") === "true";
        /* Close other days only inside - the current itinerary panel*/
        const currentPanel = item.closest(".itinerary-panel");
        if (!currentPanel) return;
        const currentItems = currentPanel.querySelectorAll(".itinerary-item");
        currentItems.forEach(function (otherItem) {
          if (otherItem === item) return;
          const otherToggle = otherItem.querySelector(".itinerary-toggle");
          const otherDetails = otherItem.querySelector(".itinerary-details");
          const otherArrow = otherItem.querySelector(".itinerary-arrow");
          if (!otherToggle || !otherDetails || !otherArrow) return;
          otherToggle.setAttribute("aria-expanded", "false");
          otherDetails.style.maxHeight = "0px";
          otherDetails.style.opacity = "0";
          otherArrow.classList.remove("rotate-180");
        });
        /* Toggle selected day */
        if (isOpen) {
          toggle.setAttribute("aria-expanded", "false");
          details.style.maxHeight = "0px";
          details.style.opacity = "0";
          arrow.classList.remove("rotate-180");
        } else {
          toggle.setAttribute("aria-expanded", "true");
          details.style.maxHeight = details.scrollHeight + "px";
          details.style.opacity = "1";
          arrow.classList.add("rotate-180");
        }
      });
    });
  }
  /* Initialize */
  initializeAccordion();
  createItineraryTabs("summer");
});
document.addEventListener("DOMContentLoaded", function () {
  const cards = Array.from(document.querySelectorAll(".departure-card"));
  const searchInput = document.getElementById("departure-search");
  const sortSelect = document.getElementById("departure-sort");
  const grid = document.getElementById("departures-grid");
  const resultCount = document.getElementById("results-count");
  const emptyState = document.getElementById("empty-state");
  if (!searchInput || !sortSelect || !grid || !resultCount || !emptyState) {
    return;
  }

  const category = document.getElementById("filter-category");
  const region = document.getElementById("filter-region");
  const difficulty = document.getElementById("filter-difficulty");
  const durationMin = document.getElementById("duration-min");
  const durationMax = document.getElementById("duration-max");
  const budgetMin = document.getElementById("budget-min");
  const budgetMax = document.getElementById("budget-max");
  const seatsOnly = document.getElementById("seats-only");

  const mobileCategory = document.getElementById("mobile-category");
  const mobileRegion = document.getElementById("mobile-region");
  const mobileDifficulty = document.getElementById("mobile-difficulty");
  const mobileDurationMin = document.getElementById("mobile-duration-min");
  const mobileDurationMax = document.getElementById("mobile-duration-max");
  const mobileBudgetMin = document.getElementById("mobile-budget-min");
  const mobileBudgetMax = document.getElementById("mobile-budget-max");
  const mobileSeatsOnly = document.getElementById("mobile-seats-only");
  /* FILTER VALUES*/
  let activeFilters = {
    category: "",
    region: "",
    difficulty: "",
    durationMin: 1,
    durationMax: 100,
    budgetMin: 0,
    budgetMax: 50000,
    seatsOnly: false,
  };
  /* APPLY FILTERS */
  function applyFilters() {
    const searchTerm = searchInput.value.trim().toLowerCase();
    let visibleCards = [];
    cards.forEach(function (card) {
      const name = card.dataset.name.toLowerCase();
      const cardCategory = card.dataset.category;
      const cardRegion = card.dataset.region;
      const cardDifficulty = card.dataset.difficulty;

      const cardDuration = Number(card.dataset.duration);
      const cardPrice = Number(card.dataset.price);
      const cardSeats = Number(card.dataset.seats);

      const matchesSearch =
        !searchTerm ||
        name.includes(searchTerm) ||
        cardCategory.toLowerCase().includes(searchTerm) ||
        cardRegion.toLowerCase().includes(searchTerm);

      const matchesCategory =
        !activeFilters.category || cardCategory === activeFilters.category;
      const matchesRegion =
        !activeFilters.region || cardRegion === activeFilters.region;
      const matchesDifficulty =
        !activeFilters.difficulty ||
        cardDifficulty === activeFilters.difficulty;
      const matchesDuration =
        cardDuration >= activeFilters.durationMin &&
        cardDuration <= activeFilters.durationMax;
      const matchesBudget =
        cardPrice >= activeFilters.budgetMin &&
        cardPrice <= activeFilters.budgetMax;
      const matchesSeats = !activeFilters.seatsOnly || cardSeats > 0;
      const visible =
        matchesSearch &&
        matchesCategory &&
        matchesRegion &&
        matchesDifficulty &&
        matchesDuration &&
        matchesBudget &&
        matchesSeats;
      if (visible) {
        card.classList.remove("hidden");
        visibleCards.push(card);
      } else {
        card.classList.add("hidden");
      }
    });
    sortCards(visibleCards);
    resultCount.textContent =
      visibleCards.length +
      (visibleCards.length === 1 ? " departure found" : " departures found");
    if (visibleCards.length === 0) {
      emptyState.classList.remove("hidden");
    } else {
      emptyState.classList.add("hidden");
    }
  }
  function sortCards(visibleCards) {
    const sortValue = sortSelect.value;
    const sorted = [...visibleCards];
    sorted.sort(function (a, b) {
      if (sortValue === "price-low") {
        return Number(a.dataset.price) - Number(b.dataset.price);
      }
      if (sortValue === "price-high") {
        return Number(b.dataset.price) - Number(a.dataset.price);
      }
      if (sortValue === "duration-low") {
        return Number(a.dataset.duration) - Number(b.dataset.duration);
      }
      if (sortValue === "latest") {
        return Number(b.dataset.id) - Number(a.dataset.id);
      }
      return Number(a.dataset.id) - Number(b.dataset.id);
    });
    sorted.forEach(function (card) {
      grid.appendChild(card);
    });
  }
  function readDesktopFilters() {
    activeFilters = {
      category: category.value,
      region: region.value,
      difficulty: difficulty.value,
      durationMin: Number(durationMin.value) || 1,
      durationMax: Number(durationMax.value) || 100,
      budgetMin: Number(budgetMin.value) || 0,
      budgetMax: Number(budgetMax.value) || 500000,
      seatsOnly: seatsOnly.checked,
    };
    applyFilters();
  }
  function readMobileFilters() {
    activeFilters = {
      category: mobileCategory.value,
      region: mobileRegion.value,
      difficulty: mobileDifficulty.value,
      durationMin: Number(mobileDurationMin.value) || 1,
      durationMax: Number(mobileDurationMax.value) || 100,
      budgetMin: Number(mobileBudgetMin.value) || 0,
      budgetMax: Number(mobileBudgetMax.value) || 50000,
      seatsOnly: mobileSeatsOnly.checked,
    };
    category.value = activeFilters.category;
    region.value = activeFilters.region;
    difficulty.value = activeFilters.difficulty;
    durationMin.value = activeFilters.durationMin;
    durationMax.value = activeFilters.durationMax;
    budgetMin.value = activeFilters.budgetMin;
    budgetMax.value = activeFilters.budgetMax;
    seatsOnly.checked = activeFilters.seatsOnly;
    applyFilters();
    closeMobileFilters();
  }
  function resetFilters() {
    category.value = "";
    region.value = "";
    difficulty.value = "";
    durationMin.value = 1;
    durationMax.value = 100;
    budgetMin.value = 0;
    budgetMax.value = 500000;
    seatsOnly.checked = false;
    mobileCategory.value = "";
    mobileRegion.value = "";
    mobileDifficulty.value = "";
    mobileDurationMin.value = 1;
    mobileDurationMax.value = 100;
    mobileBudgetMin.value = 0;
    mobileBudgetMax.value = 50000;
    mobileSeatsOnly.checked = false;
    searchInput.value = "";
    sortSelect.value = "soonest";
    activeFilters = {
      category: "",
      region: "",
      difficulty: "",
      durationMin: 1,
      durationMax: 100,
      budgetMin: 0,
      budgetMax: 50000,
      seatsOnly: false,
    };
    applyFilters();
  }
  searchInput.addEventListener("input", function () {
    applyFilters();
  });
  sortSelect.addEventListener("change", function () {
    applyFilters();
  });
  document
    .getElementById("apply-filters-desktop")
    .addEventListener("click", readDesktopFilters);
  document
    .getElementById("reset-filters-desktop")
    .addEventListener("click", resetFilters);
  document
    .getElementById("empty-reset")
    .addEventListener("click", resetFilters);
  const gridButton = document.getElementById("grid-view");
  const listButton = document.getElementById("list-view");
  gridButton.addEventListener("click", function () {
    grid.classList.remove("grid-cols-1", "md:grid-cols-1");
    grid.classList.add("grid-cols-1", "md:grid-cols-2", "xl:grid-cols-3");
    gridButton.classList.add("bg-[var(--teal-brand)]", "text-white");
    gridButton.classList.remove("text-[var(--text-primary)]");
    listButton.classList.remove("bg-[var(--teal-brand)]", "text-white");
    listButton.classList.add("text-[var(--text-primary)]");
    cards.forEach(function (card) {
      card.classList.remove("list-layout");
    });
  });

  listButton.addEventListener("click", function () {
    grid.classList.remove("grid-cols-1", "md:grid-cols-2", "xl:grid-cols-3");
    grid.classList.add("grid-cols-1");
    listButton.classList.add("bg-[var(--teal-brand)]", "text-white");
    listButton.classList.remove("text-[var(--text-primary)]");
    gridButton.classList.remove("bg-[var(--teal-brand)]", "text-white");
    gridButton.classList.add("text-[var(--text-primary)]");
    cards.forEach(function (card) {
      card.classList.add("list-layout");
    });
  });

  /* MOBILE FILTER DRAWER*/
  const mobileFilter = document.getElementById("mobile-filter");
  const filterOverlay = document.getElementById("filter-overlay");
  function openMobileFilters() {
    mobileFilter.classList.remove("hidden");
    filterOverlay.classList.remove("hidden");
    document.body.classList.add("overflow-hidden");
  }
  function closeMobileFilters() {
    mobileFilter.classList.add("hidden");
    filterOverlay.classList.add("hidden");
    document.body.classList.remove("overflow-hidden");
  }
  document
    .getElementById("open-filters")
    .addEventListener("click", openMobileFilters);
  document
    .getElementById("close-filters")
    .addEventListener("click", closeMobileFilters);
  filterOverlay.addEventListener("click", closeMobileFilters);
  document
    .getElementById("apply-mobile-filters")
    .addEventListener("click", readMobileFilters);
  document
    .getElementById("reset-mobile-filters")
    .addEventListener("click", function () {
      resetFilters();

      closeMobileFilters();
    });
  /* INITIALIZE*/
  applyFilters();
});
document.addEventListener("DOMContentLoaded", function () {
  const heroSwiperElement = document.querySelector(".hero-image-swiper");
  if (!heroSwiperElement || typeof Swiper === "undefined") {
    return;
  }
  const prevButton = document.querySelector(".hero-swiper-prev");
  const nextButton = document.querySelector(".hero-swiper-next");
  new Swiper(heroSwiperElement, {
    loop: true,
    speed: 800,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
      pauseOnMouseEnter: false,
    },
    allowTouchMove: true,
    navigation: {
      prevEl: prevButton,
      nextEl: nextButton,
    },
  });
});
//Global satori-gallery-pagery image model
document.addEventListener("DOMContentLoaded", function () {
  const galleryModal = document.getElementById("globalGalleryModal");
  const galleryContent = document.getElementById("globalGalleryContent");
  const galleryImage = document.getElementById("globalGalleryImage");
  const galleryTitle = document.getElementById("globalGalleryTitle");
  const galleryCounter = document.getElementById("globalGalleryCounter");
  const galleryClose = document.getElementById("globalGalleryClose");
  const galleryPrev = document.getElementById("globalGalleryPrev");
  const galleryNext = document.getElementById("globalGalleryNext");
  let galleryItems = [];
  let galleryIndex = 0;
  let galleryGroup = null;
  function getGalleryItems(group) {
    if (!group) {
      return [];
    }
    return Array.from(
      document.querySelectorAll(
        `[data-gallery-item][data-gallery-group="${CSS.escape(group)}"]`,
      ),
    );
  }
  function getItemData(item) {
    if (!item) {
      return {
        image: "",
        title: "",
      };
    }
    const image =
      item.dataset.galleryImage ||
      item.dataset.image ||
      item.querySelector("img")?.src ||
      "";
    const title =
      item.dataset.galleryTitle ||
      item.dataset.title ||
      item.querySelector("img")?.alt ||
      "Satori Gallery";
    return {
      image,
      title,
    };
  }
  function updateNavigation() {
    const onlyOne = galleryItems.length <= 1;
    if (galleryPrev) {
      galleryPrev.disabled = onlyOne;
      galleryPrev.classList.toggle("opacity-30", onlyOne);
    }
    if (galleryNext) {
      galleryNext.disabled = onlyOne;
      galleryNext.classList.toggle("opacity-30", onlyOne);
    }
  }
  function renderGallery() {
    if (!galleryItems.length) {
      return;
    }
    const item = galleryItems[galleryIndex];
    if (!item) {
      return;
    }
    const data = getItemData(item);
    if (!data.image) {
      return;
    }
    galleryImage.src = data.image;
    galleryImage.alt = data.title;
    galleryTitle.textContent = data.title;
    galleryCounter.textContent = `${galleryIndex + 1} / ${galleryItems.length}`;
    updateNavigation();
  }
  function openGallery(item) {
    if (!galleryModal || !item) {
      return;
    }
    galleryGroup = item.dataset.galleryGroup || "default";
    galleryItems = getGalleryItems(galleryGroup);
    if (!galleryItems.length) {
      return;
    }
    galleryIndex = galleryItems.indexOf(item);
    if (galleryIndex < 0) {
      galleryIndex = 0;
    }
    renderGallery();
    galleryModal.classList.remove("hidden");
    galleryModal.classList.add("flex");
    galleryModal.setAttribute("aria-hidden", "false");
    document.body.classList.add("gallery-modal-open");
    requestAnimationFrame(function () {
      galleryContent?.classList.remove("scale-95", "opacity-0");
      galleryContent?.classList.add("scale-100", "opacity-100");
    });
    setTimeout(function () {
      galleryClose?.focus();
    }, 50);
  }
  function closeGallery() {
    if (!galleryModal) {
      return;
    }
    galleryContent?.classList.remove("scale-100", "opacity-100");
    galleryContent?.classList.add("scale-95", "opacity-0");
    setTimeout(function () {
      galleryModal.classList.remove("flex");
      galleryModal.classList.add("hidden");
      galleryModal.setAttribute("aria-hidden", "true");
      if (galleryImage) {
        galleryImage.src = "";
        galleryImage.alt = "";
      }
      if (galleryTitle) {
        galleryTitle.textContent = "";
      }
      if (galleryCounter) {
        galleryCounter.textContent = "";
      }
      galleryItems = [];
      galleryIndex = 0;
      galleryGroup = null;
      document.body.classList.remove("gallery-modal-open");
    }, 250);
  }
  function showPrevious() {
    if (galleryItems.length <= 1) {
      return;
    }
    galleryIndex =
      galleryIndex <= 0 ? galleryItems.length - 1 : galleryIndex - 1;
    renderGallery();
  }
  function showNext() {
    if (galleryItems.length <= 1) {
      return;
    }
    galleryIndex =
      galleryIndex >= galleryItems.length - 1 ? 0 : galleryIndex + 1;
    renderGallery();
  }
  document.addEventListener("click", function (event) {
    const item = event.target.closest("[data-gallery-item]");
    if (!item) {
      return;
    }
    event.preventDefault();
    openGallery(item);
  });
  galleryClose?.addEventListener("click", closeGallery);
  galleryPrev?.addEventListener("click", function (event) {
    event.preventDefault();
    showPrevious();
  });
  galleryNext?.addEventListener("click", function (event) {
    event.preventDefault();
    showNext();
  });
  galleryModal?.addEventListener("click", function (event) {
    if (event.target === galleryModal) {
      closeGallery();
    }
  });
  document.addEventListener("keydown", function (event) {
    if (!galleryModal || galleryModal.classList.contains("hidden")) {
      return;
    }
    if (event.key === "Escape") {
      event.preventDefault();
      closeGallery();
      return;
    }
    if (event.key === "ArrowLeft") {
      event.preventDefault();
      showPrevious();
      return;
    }
    if (event.key === "ArrowRight") {
      event.preventDefault();
      showNext();
      return;
    }
  });
});
//plan your trip JS
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("plan-form");
  if (!form) return;

  const get = (id) => document.getElementById(`plan-${id}`);
  const fields = {
    package: get("package"),
    fullName: get("full-name"),
    email: get("email"),
    phone: get("phone"),
    adults: get("adults"),
    children: get("children"),
    arrivalDate: get("arrival-date"),
    departureDate: get("departure-date"),
    budget: get("budget"),
    budgetDetails: get("budget-details"),
    accommodation: get("accommodation"),
    accommodationDetails: get("accommodation-details"),
    fitness: get("fitness"),
    fitnessDetails: get("fitness-details"),
    contactDetail: get("contact-detail"),
    terms: get("terms"),
    captcha: get("captcha-check"),
  };

  const errors = {
    package: get("package-error"),
    fullName: get("full-name-error"),
    email: get("email-error"),
    phone: get("phone-error"),
    travellers: get("travellers-error"),
    arrivalDate: get("arrival-date-error"),
    departureDate: get("departure-date-error"),
    budget: get("budget-error"),
    accommodation: get("accommodation-error"),
    fitness: get("fitness-error"),
    contactMethod: get("contact-method-error"),
    contactDetail: get("contact-detail-error"),
    terms: get("terms-error"),
    captcha: get("captcha-error"),
  };

  const formMessage = get("form-message");
  const totalTravellers = get("travellers-total");
  const contactRadios = [
    ...form.querySelectorAll('input[name="preferred_contact_method"]'),
  ];
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const namePattern = /^[\p{L}\p{M}\s.'’-]+$/u;

  const setError = (field, errorElement, message = "") => {
    if (errorElement) {
      errorElement.textContent = message;
      errorElement.classList.toggle("hidden", !message);
    }
    if (field) {
      field.setAttribute("aria-invalid", message ? "true" : "false");
      field.classList.toggle("border-red-500", Boolean(message));
      if (!message) field.removeAttribute("aria-invalid");
    }
    return !message;
  };

  const showMessage = (message, type = "error") => {
    if (!formMessage) return;
    formMessage.textContent = message;
    formMessage.classList.remove(
      "hidden",
      "bg-red-50",
      "text-red-600",
      "bg-green-50",
      "text-green-600",
    );
    formMessage.classList.add(
      ...(type === "success"
        ? ["bg-green-50", "text-green-600"]
        : ["bg-red-50", "text-red-600"]),
    );
  };

  const clearMessage = () => {
    if (!formMessage) return;
    formMessage.textContent = "";
    formMessage.classList.add("hidden");
    formMessage.classList.remove(
      "bg-red-50",
      "text-red-600",
      "bg-green-50",
      "text-green-600",
    );
  };

  const validatePackage = () =>
    setError(
      fields.package,
      errors.package,
      fields.package.value.trim() ? "" : "Please select a trip.",
    );

  const validateName = () => {
    const value = fields.fullName.value.trim();
    if (!value)
      return setError(
        fields.fullName,
        errors.fullName,
        "Please enter your full name.",
      );
    if (value.length < 2 || !namePattern.test(value))
      return setError(
        fields.fullName,
        errors.fullName,
        "Please enter a valid full name.",
      );
    return setError(fields.fullName, errors.fullName);
  };

  const validateEmail = () => {
    const value = fields.email.value.trim();
    if (!value)
      return setError(
        fields.email,
        errors.email,
        "Please enter your email address.",
      );
    if (!emailPattern.test(value))
      return setError(
        fields.email,
        errors.email,
        "Please enter a valid email address.",
      );
    return setError(fields.email, errors.email);
  };

  const validatePhone = () => {
    const value = fields.phone.value.trim();
    const digits = value.replace(/\D/g, "");
    if (!value)
      return setError(
        fields.phone,
        errors.phone,
        "Please enter your phone number.",
      );
    if (digits.length < 7 || digits.length > 15)
      return setError(
        fields.phone,
        errors.phone,
        "Please enter a valid phone number.",
      );
    return setError(fields.phone, errors.phone);
  };

  const validateTravellers = () => {
    const adults = Number(fields.adults.value);
    const children = Number(fields.children.value);
    const total = adults + children;
    if (totalTravellers) totalTravellers.value = String(total);

    if (
      fields.adults.value === "" ||
      !Number.isInteger(adults) ||
      adults < 1 ||
      adults > 50
    ) {
      setError(fields.children, errors.travellers, "");
      return setError(
        fields.adults,
        errors.travellers,
        "Please enter between 1 and 50 adults.",
      );
    }

    if (
      fields.children.value === "" ||
      !Number.isInteger(children) ||
      children < 0 ||
      children > 50
    ) {
      setError(fields.adults, errors.travellers, "");
      return setError(
        fields.children,
        errors.travellers,
        "Children must be between 0 and 50.",
      );
    }

    if (total > 50)
      return setError(
        fields.adults,
        errors.travellers,
        "The total number of travelers cannot exceed 50.",
      );
    setError(fields.children, errors.travellers, "");
    return setError(fields.adults, errors.travellers, "");
  };

  const parseDate = (value) => (value ? new Date(`${value}T00:00:00`) : null);

  const validateArrival = () => {
    const value = fields.arrivalDate.value;
    if (!value)
      return setError(
        fields.arrivalDate,
        errors.arrivalDate,
        "Please select your arrival date.",
      );

    const today = new Date();
    today.setHours(0, 0, 0, 0);
    if (parseDate(value) < today)
      return setError(
        fields.arrivalDate,
        errors.arrivalDate,
        "Arrival date cannot be in the past.",
      );
    return setError(fields.arrivalDate, errors.arrivalDate);
  };

  const validateDeparture = () => {
    const value = fields.departureDate.value;
    if (!value)
      return setError(
        fields.departureDate,
        errors.departureDate,
        "Please select your departure date.",
      );
    if (
      fields.arrivalDate.value &&
      parseDate(value) <= parseDate(fields.arrivalDate.value)
    ) {
      return setError(
        fields.departureDate,
        errors.departureDate,
        "Departure date must be after arrival date.",
      );
    }
    return setError(fields.departureDate, errors.departureDate);
  };

  const validateBudget = () =>
    setError(
      fields.budget,
      errors.budget,
      fields.budget.value ? "" : "Please select your budget preference.",
    );

  const validateAccommodation = () =>
    setError(
      fields.accommodation,
      errors.accommodation,
      fields.accommodation.value
        ? ""
        : "Please select your accommodation preference.",
    );

  const validateFitness = () =>
    setError(
      fields.fitness,
      errors.fitness,
      fields.fitness.value
        ? ""
        : "Please select your fitness or experience level.",
    );

  const getContactMethod = () =>
    contactRadios.find((radio) => radio.checked)?.value || "";

  const validateContactMethod = () => {
    const valid = Boolean(getContactMethod());
    if (errors.contactMethod) {
      errors.contactMethod.textContent = valid
        ? ""
        : "Please select your preferred contact method.";
      errors.contactMethod.classList.toggle("hidden", valid);
    }
    return valid;
  };

  const validateContactDetail = () => {
    const method = getContactMethod();
    const value = fields.contactDetail.value.trim();

    if (!method)
      return setError(
        fields.contactDetail,
        errors.contactDetail,
        "Please select a contact method first.",
      );
    if (!value) {
      return setError(
        fields.contactDetail,
        errors.contactDetail,
        method === "email"
          ? "Please enter your preferred email address."
          : "Please enter your preferred contact number.",
      );
    }

    if (method === "email") {
      if (!emailPattern.test(value))
        return setError(
          fields.contactDetail,
          errors.contactDetail,
          "Please enter a valid contact email address.",
        );
    } else {
      const digits = value.replace(/\D/g, "");
      if (digits.length < 7 || digits.length > 15)
        return setError(
          fields.contactDetail,
          errors.contactDetail,
          "Please enter a valid contact number.",
        );
    }

    return setError(fields.contactDetail, errors.contactDetail);
  };

  const validateCheckbox = (field, errorElement, message) =>
    setError(field, errorElement, field.checked ? "" : message);

  const rules = {
    package: validatePackage,
    fullName: validateName,
    email: validateEmail,
    phone: validatePhone,
    travellers: validateTravellers,
    arrivalDate: validateArrival,
    departureDate: validateDeparture,
    budget: validateBudget,
    accommodation: validateAccommodation,
    fitness: validateFitness,
    contactMethod: validateContactMethod,
    contactDetail: validateContactDetail,
    terms: () =>
      validateCheckbox(
        fields.terms,
        errors.terms,
        "Please accept the terms and conditions.",
      ),
    captcha: () =>
      validateCheckbox(
        fields.captcha,
        errors.captcha,
        "Please confirm that you are not a robot.",
      ),
  };

  const updateConditionalField = (select, wrapper, input, showValue) => {
    if (!select || !wrapper || !input) return;
    const shouldShow = select.value === showValue;
    wrapper.classList.toggle("hidden", !shouldShow);
    input.required = shouldShow;
    if (!shouldShow) {
      input.value = "";
      input.removeAttribute("aria-invalid");
      input.classList.remove("border-red-500");
    }
  };

  const updateBudgetField = () =>
    updateConditionalField(
      fields.budget,
      get("budget-details-wrap"),
      fields.budgetDetails,
      "not-sure",
    );
  const updateAccommodationField = () =>
    updateConditionalField(
      fields.accommodation,
      get("accommodation-details-wrap"),
      fields.accommodationDetails,
      "no-preference",
    );
  const updateFitnessField = () =>
    updateConditionalField(
      fields.fitness,
      get("fitness-details-wrap"),
      fields.fitnessDetails,
      "not-sure",
    );

  const updateContactField = () => {
    const method = getContactMethod();
    fields.contactDetail.value = "";
    fields.contactDetail.type = method === "email" ? "email" : "tel";
    fields.contactDetail.placeholder =
      method === "email"
        ? "Enter your preferred email address"
        : method
          ? "Enter your preferred contact number"
          : "Select a contact method first";
    validateContactMethod();
    setError(fields.contactDetail, errors.contactDetail);
    clearMessage();
  };

  form.querySelectorAll("[data-counter-target]").forEach((button) => {
    button.addEventListener("click", () => {
      const target = get(button.dataset.counterTarget.replace(/^plan-/, ""));
      if (!target) return;
      const step = Number(button.dataset.counterStep) || 0;
      const min = Number(target.min);
      const max = Number(target.max);
      target.value = String(
        Math.min(max, Math.max(min, (Number(target.value) || 0) + step)),
      );
      validateTravellers();
      clearMessage();
    });
  });

  [fields.adults, fields.children].forEach((field) => {
    field.addEventListener("input", () => {
      validateTravellers();
      clearMessage();
    });
    field.addEventListener("blur", validateTravellers);
  });

  fields.budget.addEventListener("change", () => {
    updateBudgetField();
    validateBudget();
    clearMessage();
  });

  fields.accommodation.addEventListener("change", () => {
    updateAccommodationField();
    validateAccommodation();
    clearMessage();
  });

  fields.fitness.addEventListener("change", () => {
    updateFitnessField();
    validateFitness();
    clearMessage();
  });

  contactRadios.forEach((radio) =>
    radio.addEventListener("change", updateContactField),
  );

  const liveFields = {
    package: fields.package,
    fullName: fields.fullName,
    email: fields.email,
    phone: fields.phone,
    arrivalDate: fields.arrivalDate,
    departureDate: fields.departureDate,
  };

  Object.entries(liveFields).forEach(([key, field]) => {
    const eventName =
      field.tagName === "SELECT" || field.type === "date" ? "change" : "input";
    field.addEventListener(eventName, () => {
      rules[key]();
      if (key === "arrivalDate" && fields.departureDate.value)
        validateDeparture();
      clearMessage();
    });
    field.addEventListener("blur", rules[key]);
  });

  fields.contactDetail.addEventListener("input", () => {
    validateContactDetail();
    clearMessage();
  });

  fields.terms.addEventListener("change", () => {
    rules.terms();
    clearMessage();
  });

  fields.captcha.addEventListener("change", () => {
    rules.captcha();
    clearMessage();
  });

  updateBudgetField();
  updateAccommodationField();
  updateFitnessField();

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    clearMessage();

    const isValid = Object.values(rules)
      .map((validate) => validate())
      .every(Boolean);

    if (!isValid) {
      showMessage("Please correct the highlighted fields before submitting.");
      const firstInvalidField =
        form.querySelector('[aria-invalid="true"]') ||
        form.querySelector(
          'input[name="preferred_contact_method"]:not(:checked)',
        );
      if (firstInvalidField) firstInvalidField.focus();
      return;
    }

    showMessage(
      "Your custom trip request is ready. Backend submission has not been connected yet.",
      "success",
    );
  });
});
// Book your trip
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("trip-booking-form");
  const formMessage = document.getElementById("booking-form-message");
  if (!form) return;

  const fields = {
    package: document.getElementById("package"),
    fullName: document.getElementById("full-name"),
    email: document.getElementById("email"),
    phone: document.getElementById("phone"),
    travellers: document.getElementById("travellers"),
    adultPax: document.getElementById("adult-pax"),
    childrenPax: document.getElementById("children-pax"),
    address: document.getElementById("address"),
    country: document.getElementById("country"),
    whatsappViber: document.getElementById("whatsapp-viber"),
    preferredContactDetail: document.getElementById("preferred-contact-detail"),
    paymentMethod: document.getElementById("payment-method"),
    paymentOption: document.getElementById("payment-option"),
    arrivalDate: document.getElementById("arrival-date"),
    departureDate: document.getElementById("departure-date"),
    terms: document.getElementById("terms"),
    captcha: document.getElementById("captcha-check"),
  };

  const errors = {
    package: document.getElementById("package-error"),
    fullName: document.getElementById("full-name-error"),
    email: document.getElementById("email-error"),
    phone: document.getElementById("phone-error"),
    travellers: document.getElementById("travellers-error"),
    adultPax: document.getElementById("adult-pax-error"),
    childrenPax: document.getElementById("children-pax-error"),
    address: document.getElementById("address-error"),
    country: document.getElementById("country-error"),
    whatsappViber: document.getElementById("whatsapp-viber-error"),
    preferredContactMethod: document.getElementById(
      "preferred-contact-method-error",
    ),
    preferredContactDetail: document.getElementById(
      "preferred-contact-detail-error",
    ),
    paymentMethod: document.getElementById("payment-method-error"),
    paymentOption: document.getElementById("payment-option-error"),
    arrivalDate: document.getElementById("arrival-date-error"),
    departureDate: document.getElementById("departure-date-error"),
    terms: document.getElementById("terms-error"),
    captcha: document.getElementById("captcha-error"),
  };

  const getContactMethod = () =>
    form.querySelector('input[name="preferred_contact_method"]:checked')
      ?.value || "";
  const setFieldState = (field, errorElement, message) => {
    if (!field || !errorElement) return !message;
    if (message) {
      errorElement.textContent = message;
      errorElement.classList.remove("hidden");
      field.setAttribute("aria-invalid", "true");
      field.classList.remove("border-[#D9D9D9]", "border-slate-200");
      field.classList.add("border-red-500");
      return false;
    }
    errorElement.textContent = "";
    errorElement.classList.add("hidden");
    field.removeAttribute("aria-invalid");
    field.classList.remove("border-red-500");
    return true;
  };
  const setContactMethodState = (message) => {
    const group = document.getElementById("preferred-contact-method-group");
    if (errors.preferredContactMethod) {
      errors.preferredContactMethod.textContent = message;
      errors.preferredContactMethod.classList.toggle("hidden", !message);
    }
    if (group) {
      group.setAttribute("aria-invalid", message ? "true" : "false");
      group.classList.toggle("border-red-500", Boolean(message));
    }
    return !message;
  };

  const validationRules = {
    package: () =>
      fields.package.value.trim() ? "" : "Please select a package.",
    fullName: () => {
      const value = fields.fullName.value.trim();
      if (!value) return "Please enter your full name.";
      if (value.length < 2) return "Full name must be at least 2 characters.";
      return /^[a-zA-ZÀ-ÿ\s.'-]+$/.test(value)
        ? ""
        : "Please enter a valid name.";
    },
    email: () => {
      const value = fields.email.value.trim();
      if (!value) return "Please enter your email address.";
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)
        ? ""
        : "Please enter a valid email address.";
    },
    phone: () => {
      const value = fields.phone.value.trim();
      if (!value) return "Please enter your mobile number.";
      const digits = value.replace(/\D/g, "");
      return digits.length >= 7 && digits.length <= 15
        ? ""
        : "Please enter a valid mobile number.";
    },
    travellers: () => {
      const value = Number(fields.travellers.value);
      if (!fields.travellers.value)
        return "Please enter the total number of travellers.";
      if (!Number.isInteger(value) || value < 1 || value > 50)
        return "Total travellers must be between 1 and 50.";
      return value ===
        Number(fields.adultPax.value) + Number(fields.childrenPax.value)
        ? ""
        : "Total travellers must equal adult pax plus children pax.";
    },
    adultPax: () => {
      const value = Number(fields.adultPax.value);
      return fields.adultPax.value !== "" &&
        Number.isInteger(value) &&
        value >= 1 &&
        value <= 50
        ? ""
        : "Adult pax must be between 1 and 50.";
    },
    childrenPax: () => {
      const value = Number(fields.childrenPax.value);
      return fields.childrenPax.value !== "" &&
        Number.isInteger(value) &&
        value >= 0 &&
        value <= 50
        ? ""
        : "Children pax must be between 0 and 50.";
    },
    address: () =>
      fields.address.value.trim() ? "" : "Please enter your address.",
    country: () => (fields.country.value ? "" : "Please select your country."),
    whatsappViber: () => {
      const value = fields.whatsappViber.value.trim();
      if (!value) return "";
      const digits = value.replace(/\D/g, "");
      return digits.length >= 7 && digits.length <= 15
        ? ""
        : "Please enter a valid WhatsApp/Viber number.";
    },
    preferredContactDetail: () => {
      const value = fields.preferredContactDetail.value.trim();
      const method = getContactMethod();
      if (!value) return "Please enter your preferred contact detail.";
      if (method === "email")
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)
          ? ""
          : "Please enter a valid email address.";
      if (["whatsapp", "viber", "phone_call"].includes(method)) {
        const digits = value.replace(/\D/g, "");
        return digits.length >= 7 && digits.length <= 15
          ? ""
          : "Please enter a valid contact number.";
      }
      return "";
    },
    paymentMethod: () =>
      fields.paymentMethod.value ? "" : "Please select a payment method.",
    paymentOption: () =>
      fields.paymentOption.value ? "" : "Please select a payment option.",
    arrivalDate: () => {
      const value = fields.arrivalDate.value;
      if (!value) return "Please select your arrival date.";
      const today = new Date();
      today.setHours(0, 0, 0, 0);
      return new Date(`${value}T00:00:00`) < today
        ? "Arrival date cannot be in the past."
        : "";
    },
    departureDate: () => {
      const value = fields.departureDate.value;
      if (!value) return "Please select your departure date.";
      if (
        fields.arrivalDate.value &&
        new Date(`${value}T00:00:00`) <=
          new Date(`${fields.arrivalDate.value}T00:00:00`)
      )
        return "Departure date must be after arrival date.";
      return "";
    },
    terms: () =>
      fields.terms.checked ? "" : "Please accept the terms and conditions.",
    captcha: () =>
      fields.captcha.checked ? "" : "Please confirm that you are not a robot.",
  };

  const validateField = (name) =>
    setFieldState(fields[name], errors[name], validationRules[name]());
  const validateDates = () => {
    const arrivalValid = validateField("arrivalDate");
    const departureValid = validateField("departureDate");
    return arrivalValid && departureValid;
  };
  const syncTravellerTotal = () => {
    const adults = Number(fields.adultPax.value || 0);
    const children = Number(fields.childrenPax.value || 0);
    fields.travellers.value = adults + children;
    setFieldState(fields.travellers, errors.travellers, "");
  };
  const clearFormMessage = () => {
    if (!formMessage) return;
    formMessage.textContent = "";
    formMessage.classList.add("hidden");
    formMessage.classList.remove(
      "bg-red-50",
      "text-red-600",
      "bg-green-50",
      "text-green-600",
    );
  };
  const showFormMessage = (message, type = "error") => {
    if (!formMessage) return;
    formMessage.textContent = message;
    formMessage.classList.remove(
      "hidden",
      "bg-red-50",
      "text-red-600",
      "bg-green-50",
      "text-green-600",
    );
    formMessage.classList.add(
      ...(type === "success"
        ? ["bg-green-50", "text-green-600"]
        : ["bg-red-50", "text-red-600"]),
    );
  };
  const validateForm = () => {
    let valid = true;
    Object.keys(validationRules).forEach((name) => {
      if (!validateField(name)) valid = false;
    });
    if (!getContactMethod()) {
      setContactMethodState("Please select your preferred contact method.");
      valid = false;
    } else {
      setContactMethodState("");
    }
    return valid;
  };

  Object.keys(fields).forEach((name) => {
    const field = fields[name];
    if (!field) return;
    const eventName =
      field.type === "checkbox" ||
      field.type === "date" ||
      field.tagName === "SELECT"
        ? "change"
        : "input";
    field.addEventListener(eventName, () => {
      clearFormMessage();
      if (["adultPax", "childrenPax"].includes(name)) syncTravellerTotal();
      if (validationRules[name]) validateField(name);
      if (name === "arrivalDate" || name === "departureDate") validateDates();
    });
    field.addEventListener("blur", () => {
      if (validationRules[name]) validateField(name);
      if (name === "arrivalDate" || name === "departureDate") validateDates();
    });
  });

  form
    .querySelectorAll('input[name="preferred_contact_method"]')
    .forEach((radio) => {
      radio.addEventListener("change", () => {
        const method = getContactMethod();
        fields.preferredContactDetail.placeholder =
          method === "email"
            ? "Enter your preferred email address"
            : "Enter your preferred contact number";
        setContactMethodState("");
        validateField("preferredContactDetail");
        clearFormMessage();
      });
    });

  form.querySelectorAll("[data-pax-target]").forEach((button) => {
    button.addEventListener("click", () => {
      const field = document.getElementById(button.dataset.paxTarget);
      if (!field) return;
      const min = Number(field.min || 0);
      const max = Number(field.max || 50);
      const next = Math.min(
        max,
        Math.max(min, Number(field.value || 0) + Number(button.dataset.step)),
      );
      field.value = next;
      field.dispatchEvent(new Event("input", { bubbles: true }));
    });
  });

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    clearFormMessage();
    if (!validateForm()) {
      showFormMessage(
        "Please correct the highlighted fields before submitting.",
      );
      const firstInvalidField = form.querySelector('[aria-invalid="true"]');
      if (firstInvalidField) {
        if (firstInvalidField.focus) firstInvalidField.focus();
        else
          form.querySelector('input[name="preferred_contact_method"]')?.focus();
      }
      return;
    }
    showFormMessage("Your trip request is ready to be submitted.", "success");
    // Connect the backend endpoint here before enabling actual submission.
  });
});
// Contact form JS validation
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contact-form");
  const formMessage = document.getElementById("contact-form-message");

  if (!form) {
    return;
  }

  const fields = {
    fullName: document.getElementById("full-name"),
    email: document.getElementById("email"),
    country: document.getElementById("country"),
    phone: document.getElementById("phone"),
    question: document.getElementById("question"),
    preferredContactMethod: document.querySelectorAll(
      'input[name="preferred_contact_method"]',
    ),
    preferredContactValue: document.getElementById("preferred-contact-value"),
    captcha: document.getElementById("captcha-check"),
  };

  const errors = {
    fullName: document.getElementById("full-name-error"),
    email: document.getElementById("email-error"),
    country: document.getElementById("country-error"),
    phone: document.getElementById("phone-error"),
    question: document.getElementById("question-error"),
    preferredContactMethod: document.getElementById(
      "preferred-contact-method-error",
    ),
    preferredContactValue: document.getElementById(
      "preferred-contact-value-error",
    ),
    captcha: document.getElementById("captcha-error"),
  };

  const validationRules = {
    fullName: () => {
      const value = fields.fullName.value.trim();

      if (!value) {
        return "Please enter your full name.";
      }

      if (value.length < 2) {
        return "Full name must be at least 2 characters.";
      }

      if (!/^[a-zA-ZÀ-ÿ\s.'-]+$/.test(value)) {
        return "Please enter a valid name.";
      }

      return "";
    },

    email: () => {
      const value = fields.email.value.trim();

      if (!value) {
        return "Please enter your email address.";
      }

      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!emailPattern.test(value)) {
        return "Please enter a valid email address.";
      }

      return "";
    },

    country: () => {
      const value = fields.country.value;

      if (!value) {
        return "Please select your country.";
      }

      return "";
    },

    phone: () => {
      const value = fields.phone.value.trim();

      if (!value) {
        return "";
      }

      const phoneDigits = value.replace(/\D/g, "");

      if (phoneDigits.length < 7 || phoneDigits.length > 15) {
        return "Please enter a valid phone number.";
      }

      return "";
    },

    preferredContactMethod: () => {
      const selected = document.querySelector(
        'input[name="preferred_contact_method"]:checked',
      );

      if (!selected) {
        return "Please select your preferred contact method.";
      }

      return "";
    },

    preferredContactValue: () => {
      const selected = document.querySelector(
        'input[name="preferred_contact_method"]:checked',
      );

      if (!selected) {
        return "";
      }

      if (selected.value === "Email" || selected.value === "Phone Call") {
        return "";
      }

      const value = fields.preferredContactValue.value.trim();

      if (!value) {
        return `Please enter your ${selected.value.toLowerCase()} contact number.`;
      }

      const phoneDigits = value.replace(/\D/g, "");

      if (phoneDigits.length < 7 || phoneDigits.length > 15) {
        return "Please enter a valid phone number.";
      }

      return "";
    },

    question: () => {
      const value = fields.question.value.trim();

      if (!value) {
        return "Please enter your question.";
      }

      if (value.length < 10) {
        return "Question must be at least 10 characters.";
      }

      return "";
    },

    captcha: () => {
      if (!fields.captcha.checked) {
        return "Please confirm that you are not a robot.";
      }

      return "";
    },
  };

  const setFieldState = (field, errorElement, message) => {
    if (!field || !errorElement) {
      return false;
    }

    if (message) {
      errorElement.textContent = message;
      errorElement.classList.remove("hidden");

      field.setAttribute("aria-invalid", "true");
      field.classList.remove("border-white");
      field.classList.add("border-red-500");

      return false;
    }

    errorElement.textContent = "";
    errorElement.classList.add("hidden");

    field.removeAttribute("aria-invalid");
    field.classList.remove("border-red-500");
    field.classList.add("border-white");

    return true;
  };

  const validateField = (fieldName) => {
    if (!validationRules[fieldName]) {
      return true;
    }

    if (fieldName === "preferredContactMethod") {
      const message = validationRules[fieldName]();
      const errorElement = errors[fieldName];

      if (!errorElement) {
        return !message;
      }

      if (message) {
        errorElement.textContent = message;
        errorElement.classList.remove("hidden");

        fields.preferredContactMethod.forEach((radio) => {
          radio.setAttribute("aria-invalid", "true");
        });

        return false;
      }

      errorElement.textContent = "";
      errorElement.classList.add("hidden");

      fields.preferredContactMethod.forEach((radio) => {
        radio.removeAttribute("aria-invalid");
      });

      return true;
    }

    const message = validationRules[fieldName]();

    return setFieldState(fields[fieldName], errors[fieldName], message);
  };

  const validateForm = () => {
    let isValid = true;

    Object.keys(validationRules).forEach((fieldName) => {
      if (!validateField(fieldName)) {
        isValid = false;
      }
    });

    return isValid;
  };

  const showFormMessage = (message, type = "error") => {
    if (!formMessage) {
      return;
    }

    formMessage.textContent = message;

    formMessage.classList.remove(
      "hidden",
      "bg-red-50",
      "text-red-600",
      "bg-green-50",
      "text-green-600",
    );

    if (type === "success") {
      formMessage.classList.add("bg-green-50", "text-green-600");
    } else {
      formMessage.classList.add("bg-red-50", "text-red-600");
    }
  };

  const clearFormMessage = () => {
    if (!formMessage) {
      return;
    }

    formMessage.textContent = "";
    formMessage.classList.add("hidden");

    formMessage.classList.remove(
      "bg-red-50",
      "text-red-600",
      "bg-green-50",
      "text-green-600",
    );
  };

  Object.keys(fields).forEach((fieldName) => {
    const field = fields[fieldName];

    if (!field || !validationRules[fieldName]) {
      return;
    }

    if (fieldName === "preferredContactMethod") {
      return;
    }

    const eventName = field.type === "checkbox" ? "change" : "input";

    field.addEventListener(eventName, () => {
      validateField(fieldName);
      clearFormMessage();
    });

    field.addEventListener("blur", () => {
      validateField(fieldName);
    });
  });

  const preferredContactRadios = document.querySelectorAll(
    'input[name="preferred_contact_method"]',
  );

  const preferredContactDetails = document.getElementById(
    "preferred-contact-details",
  );

  const preferredContactValue = document.getElementById(
    "preferred-contact-value",
  );

  const resetPreferredContactValue = () => {
    if (!preferredContactValue) {
      return;
    }

    preferredContactValue.value = "";
    preferredContactValue.type = "text";
    preferredContactValue.placeholder = "";
    preferredContactValue.removeAttribute("autocomplete");
    preferredContactValue.removeAttribute("aria-invalid");

    preferredContactValue.classList.remove("border-red-500");
    preferredContactValue.classList.add("border-white");

    if (errors.preferredContactValue) {
      errors.preferredContactValue.textContent = "";
      errors.preferredContactValue.classList.add("hidden");
    }
  };

  preferredContactRadios.forEach((radio) => {
    radio.addEventListener("change", () => {
      const selectedMethod = document.querySelector(
        'input[name="preferred_contact_method"]:checked',
      );

      if (!selectedMethod) {
        preferredContactDetails?.classList.add("hidden");
        resetPreferredContactValue();
        return;
      }

      const method = selectedMethod.value;

      if (method === "WhatsApp" || method === "Viber") {
        preferredContactDetails?.classList.remove("hidden");

        preferredContactValue.type = "tel";
        preferredContactValue.placeholder = "Enter your contact number";
        preferredContactValue.autocomplete = "tel";
      } else {
        preferredContactDetails?.classList.add("hidden");
        resetPreferredContactValue();
      }

      validateField("preferredContactMethod");
      validateField("preferredContactValue");

      clearFormMessage();
    });
  });

  if (preferredContactValue) {
    preferredContactValue.addEventListener("input", () => {
      validateField("preferredContactValue");
      clearFormMessage();
    });

    preferredContactValue.addEventListener("blur", () => {
      validateField("preferredContactValue");
    });
  }

  form.addEventListener("submit", (event) => {
    event.preventDefault();

    clearFormMessage();

    const isValid = validateForm();

    if (!isValid) {
      showFormMessage(
        "Please correct the highlighted fields before submitting.",
      );

      const firstInvalidField = form.querySelector('[aria-invalid="true"]');

      if (firstInvalidField) {
        firstInvalidField.focus();
      }

      return;
    }

    /*
     * Frontend validation passed.
     * Backend integration can be added here later.
     *
     * Example:
     *
     * const formData = new FormData(form);
     *
     * fetch(form.action, {
     *     method: "POST",
     *     body: formData,
     *     headers: {
     *         "X-Requested-With": "XMLHttpRequest"
     *     }
     * })
     * .then(response => response.json())
     * .then(data => {
     *     // Handle backend response.
     * });
     */

    showFormMessage("Your message is ready to be submitted.", "success");

    // Remove this line when the backend endpoint is connected.
    // form.submit();
  });
});
// Review model JS of package details page
document.addEventListener("DOMContentLoaded", function () {
  const reviewModal = document.getElementById("reviewModal");
  const reviewModalContent = document.getElementById("reviewModalContent");
  const reviewModalSwiperElement = document.getElementById("reviewModalSwiper");
  const reviewModalSwiperWrapper = document.getElementById(
    "reviewModalSwiperWrapper",
  );
  const closeReviewModal = document.getElementById("closeReviewModal");
  const reviewModalPrev = document.getElementById("reviewModalPrev");
  const reviewModalNext = document.getElementById("reviewModalNext");
  if (!reviewModal || !reviewModalSwiperElement || !reviewModalSwiperWrapper) {
    return;
  }
  const reviewButtons = Array.from(
    document.querySelectorAll(".review-details-btn"),
  );
  function createReviewSlide(button) {
    const reviewer = button.dataset.reviewer || "";
    const reviewerImage = button.dataset.reviewerImage || "";
    const rating = parseInt(button.dataset.rating || "0", 10);
    const platform = button.dataset.platform || "";
    const date = button.dataset.date || "";
    const review = button.dataset.review || "";
    let images = [];
    try {
      images = JSON.parse(button.dataset.images || "[]");
    } catch (error) {
      images = [];
    }
    let platformLogo = "";
    if (platform.toLowerCase() === "google") {
      platformLogo = `
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Google review">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                </svg>
            `;
    } else if (platform.toLowerCase() === "tripadvisor") {
      platformLogo = `
                <img src="./assets/img/logo/icon-trip-advisor.webp" alt="TripAdvisor review" class="h-5 w-5 object-contain">
            `;
    }
    let ratingStars = "";
    for (let i = 1; i <= 5; i++) {
      if (i <= rating) {
        ratingStars += `<i class="fa-solid fa-star"></i>`;
      }
    }
    let imageHTML = "";
    images.forEach(function (image, index) {
      imageHTML += `
                <img src="${image}" alt="Review image ${index + 1}" class="review-modal-image w-full h-[120px] object-cover rounded-md cursor-pointer" data-image-index="${index}" loading="lazy">
            `;
    });
    return `
            <div class="swiper-slide">
                <div class="max-h-[92vh] overflow-y-auto">
                    <!-- Review Header -->
                    <div class="border-b border-slate-200 px-4 py-5 sm:px-6">
                        <div class="flex items-start justify-between gap-5 pr-10">
                            <!-- Reviewer -->
                            <div class="flex min-w-0 items-center gap-4">
                                <div class="h-14 w-14 shrink-0 overflow-hidden rounded-full bg-slate-200">
                                    <img src="${reviewerImage}" alt="${reviewer}" class="h-full w-full object-cover">
                                </div>
                                <div class="min-w-0">
                                    <h3 class="truncate text-lg font-bold uppercase tracking-tight text-[var(--teal-brand)] sm:text-xl">${reviewer}</h3>
                                    <div class="mt-1 flex items-center gap-2">
                                        <div class="flex gap-1 text-sm text-amber-500">${ratingStars}</div>
                                        <span class="text-slate-300">•</span>
                                        <span class="text-xs text-slate-500">${date}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Platform -->
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center">
                                ${platformLogo}
                            </div>
                        </div>
                    </div>
                    <!-- Review Content -->
                    <div class="px-4 py-4 sm:px-6 sm:py-5">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-[0.18em] text-slate-500">${platform}</span>
                        </div>
                        <p class="text-[15px] leading-7 text-slate-700 sm:text-base sm:leading-8">${review}</p>
                        <!-- Review Images -->
                        <div class="review-modal-images mt-7 grid grid-cols-2 gap-3 sm:grid-cols-3">
                            ${imageHTML}
                        </div>
                    </div>
                </div>
            </div>
        `;
  }
  function buildReviewSlides() {
    reviewModalSwiperWrapper.innerHTML = "";
    reviewButtons.forEach(function (button) {
      reviewModalSwiperWrapper.insertAdjacentHTML(
        "beforeend",
        createReviewSlide(button),
      );
    });
  }
  buildReviewSlides();
  const reviewSwiper = new Swiper(reviewModalSwiperElement, {
    slidesPerView: 1,
    spaceBetween: 0,
    speed: 450,
    autoHeight: true,
    allowTouchMove: true,
    grabCursor: true,
    observer: true,
    observeParents: true,
    navigation: {
      prevEl: reviewModalPrev,
      nextEl: reviewModalNext,
    },
    keyboard: {
      enabled: true,
      onlyInViewport: false,
    },
    effect: "slide",
    on: {
      slideChange: function () {
        const activeSlide = this.slides[this.activeIndex];
        if (activeSlide) {
          activeSlide.scrollTo({
            top: 0,
            behavior: "instant",
          });
        }
      },
    },
  });
  function openReviewModal(button) {
    const index = reviewButtons.indexOf(button);
    if (index === -1) {
      return;
    }
    reviewSwiper.slideTo(index, 0);
    reviewModal.classList.remove("hidden");
    reviewModal.classList.add("flex");
    reviewModal.setAttribute("aria-hidden", "false");
    document.body.classList.add("overflow-hidden");
    requestAnimationFrame(function () {
      reviewSwiper.update();
      reviewSwiper.slideTo(index, 0);
    });
  }
  document.addEventListener(
    "click",
    function (event) {
      const button = event.target.closest(".review-details-btn");
      if (!button) {
        return;
      }
      event.preventDefault();
      event.stopPropagation();
      openReviewModal(button);
    },
    true,
  );
  function closeReviewModalViewer() {
    reviewModal.classList.remove("flex");
    reviewModal.classList.add("hidden");
    reviewModal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("overflow-hidden");
  }
  if (closeReviewModal) {
    closeReviewModal.addEventListener("click", closeReviewModalViewer);
  }
  reviewModal.addEventListener("click", function (event) {
    if (event.target === reviewModal) {
      closeReviewModalViewer();
    }
  });
  document.addEventListener("keydown", function (event) {
    if (reviewModal.classList.contains("hidden")) {
      return;
    }
    if (event.key === "Escape") {
      closeReviewModalViewer();
    }
  });
  const reviewImageLightbox = document.getElementById("reviewImageLightbox");
  const closeReviewImageLightbox = document.getElementById(
    "closeReviewImageLightbox",
  );
  const reviewLightboxImage = document.getElementById("reviewLightboxImage");
  const reviewImagePrev = document.getElementById("reviewImagePrev");
  const reviewImageNext = document.getElementById("reviewImageNext");
  const reviewImageCounter = document.getElementById("reviewImageCounter");
  let reviewLightboxImages = [];
  let reviewLightboxIndex = 0;
  function updateReviewLightboxImage() {
    if (!reviewLightboxImage || !reviewLightboxImages.length) {
      return;
    }
    reviewLightboxImage.src = reviewLightboxImages[reviewLightboxIndex];
    reviewLightboxImage.alt = `Review image ${reviewLightboxIndex + 1}`;
    if (reviewImageCounter) {
      reviewImageCounter.textContent = `${reviewLightboxIndex + 1} / ${reviewLightboxImages.length}`;
    }
    if (reviewImagePrev) {
      reviewImagePrev.disabled = reviewLightboxIndex === 0;
    }
    if (reviewImageNext) {
      reviewImageNext.disabled =
        reviewLightboxIndex === reviewLightboxImages.length - 1;
    }
  }
  function openReviewImageLightbox(images, index) {
    if (
      !reviewImageLightbox ||
      !reviewLightboxImage ||
      !images ||
      !images.length
    ) {
      return;
    }
    reviewLightboxImages = images;
    reviewLightboxIndex = index;
    updateReviewLightboxImage();
    reviewImageLightbox.classList.remove("hidden");
    reviewImageLightbox.classList.add("flex");
    reviewImageLightbox.setAttribute("aria-hidden", "false");
  }
  function closeReviewImageViewer() {
    if (!reviewImageLightbox) {
      return;
    }
    reviewImageLightbox.classList.remove("flex");
    reviewImageLightbox.classList.add("hidden");
    reviewImageLightbox.setAttribute("aria-hidden", "true");
    if (reviewLightboxImage) {
      reviewLightboxImage.src = "";
    }
    reviewLightboxImages = [];
    reviewLightboxIndex = 0;
  }
  if (reviewImagePrev) {
    reviewImagePrev.addEventListener("click", function (event) {
      event.stopPropagation();
      if (reviewLightboxIndex > 0) {
        reviewLightboxIndex--;
        updateReviewLightboxImage();
      }
    });
  }
  if (reviewImageNext) {
    reviewImageNext.addEventListener("click", function (event) {
      event.stopPropagation();
      if (reviewLightboxIndex < reviewLightboxImages.length - 1) {
        reviewLightboxIndex++;
        updateReviewLightboxImage();
      }
    });
  }
  if (closeReviewImageLightbox) {
    closeReviewImageLightbox.addEventListener("click", closeReviewImageViewer);
  }
  if (reviewImageLightbox) {
    reviewImageLightbox.addEventListener("click", function (event) {
      if (event.target === reviewImageLightbox) {
        closeReviewImageViewer();
      }
    });
  }
  document.addEventListener("click", function (event) {
    const clickedImage = event.target.closest(".review-modal-image");
    if (!clickedImage) {
      return;
    }
    event.stopPropagation();
    const slide = clickedImage.closest(".swiper-slide");
    if (!slide) {
      return;
    }
    const images = Array.from(slide.querySelectorAll(".review-modal-image"))
      .map(function (image) {
        return image.src;
      })
      .filter(Boolean);
    if (!images.length) {
      return;
    }
    const clickedIndex = images.indexOf(clickedImage.src);
    openReviewImageLightbox(images, clickedIndex >= 0 ? clickedIndex : 0);
  });
  document.addEventListener("keydown", function (event) {
    if (
      !reviewImageLightbox ||
      reviewImageLightbox.classList.contains("hidden")
    ) {
      return;
    }
    if (event.key === "ArrowLeft" && reviewLightboxIndex > 0) {
      reviewLightboxIndex--;
      updateReviewLightboxImage();
    }
    if (
      event.key === "ArrowRight" &&
      reviewLightboxIndex < reviewLightboxImages.length - 1
    ) {
      reviewLightboxIndex++;
      updateReviewLightboxImage();
    }
    if (event.key === "Escape") {
      closeReviewImageViewer();
    }
  });
});
// Review model js of clients review page
document.addEventListener("DOMContentLoaded", function () {
  const reviewCards = Array.from(document.querySelectorAll(".review-card"));
  const searchInput = document.getElementById("review-search");
  const countrySelect = document.getElementById("country-select");
  const ratingSelect = document.getElementById("rating-select");
  const sortSelect = document.getElementById("review-sort");
  const resultCount = document.getElementById("review-result-count");
  const noReviews = document.getElementById("no-reviews");
  const loadMoreButton = document.getElementById("load-more-reviews");
  const sourceButtons = Array.from(
    document.querySelectorAll(".review-source-toggle"),
  );
  const ratingFilterButtons = Array.from(
    document.querySelectorAll(".rating-filter"),
  );
  let activeSource = "all";
  let visibleLimit = 6;
  if (!reviewCards.length) return;

  function updateSourceButtons() {
    sourceButtons.forEach(function (button) {
      const source = String(button.dataset.reviewSource || "").toLowerCase();
      const isActive = activeSource === source;
      button.classList.toggle("ring-2", isActive);
      button.classList.toggle("ring-[var(--region-heading)]", isActive);
      button.classList.toggle("ring-offset-2", isActive);
      button.setAttribute("aria-pressed", isActive ? "true" : "false");
    });
  }
  function parseReviewDate(value) {
    if (!value) return 0;
    const parts = value.split("/");
    if (parts.length === 3) {
      const month = Number(parts[0]);
      const day = Number(parts[1]);
      const year = Number(parts[2]);
      if (
        Number.isFinite(month) &&
        Number.isFinite(day) &&
        Number.isFinite(year)
      )
        return new Date(year, month - 1, day).getTime();
    }
    const timestamp = Date.parse(value);
    return Number.isNaN(timestamp) ? 0 : timestamp;
  }
  function getFilteredReviews() {
    const search = searchInput ? searchInput.value.trim().toLowerCase() : "";
    const selectedCountry = countrySelect
      ? countrySelect.value.toLowerCase()
      : "all";
    const selectedRating = ratingSelect ? ratingSelect.value : "all";
    const selectedSort = sortSelect ? sortSelect.value : "newest";
    let filteredReviews = reviewCards.filter(function (card) {
      const name = String(card.dataset.name || "").toLowerCase();
      const title = String(card.dataset.title || "").toLowerCase();
      const text = String(card.dataset.text || "").toLowerCase();
      const country = String(card.dataset.country || "").toLowerCase();
      const source = String(card.dataset.source || "").toLowerCase();
      const rating = String(card.dataset.rating || "");
      const matchesSearch =
        !search ||
        name.includes(search) ||
        title.includes(search) ||
        text.includes(search) ||
        country.includes(search);
      const matchesCountry =
        selectedCountry === "all" || country === selectedCountry;
      const matchesRating =
        selectedRating === "all" || rating === selectedRating;
      const matchesSource = activeSource === "all" || source === activeSource;
      return matchesSearch && matchesCountry && matchesRating && matchesSource;
    });
    if (selectedSort === "highest")
      filteredReviews.sort(
        (a, b) => Number(b.dataset.rating || 0) - Number(a.dataset.rating || 0),
      );
    if (selectedSort === "lowest")
      filteredReviews.sort(
        (a, b) => Number(a.dataset.rating || 0) - Number(b.dataset.rating || 0),
      );
    if (selectedSort === "newest")
      filteredReviews.sort(
        (a, b) =>
          parseReviewDate(b.dataset.reviewDate || "") -
          parseReviewDate(a.dataset.reviewDate || ""),
      );
    return filteredReviews;
  }
  function updateReviews() {
    const filteredReviews = getFilteredReviews();
    reviewCards.forEach((card) => card.classList.add("hidden"));
    filteredReviews.forEach(function (card, index) {
      if (index < visibleLimit) card.classList.remove("hidden");
    });
    const visibleCount = Math.min(visibleLimit, filteredReviews.length);
    if (resultCount)
      resultCount.textContent =
        "Showing " +
        visibleCount +
        " of " +
        filteredReviews.length +
        " matching reviews";
    if (noReviews)
      noReviews.classList.toggle("hidden", filteredReviews.length !== 0);
    if (loadMoreButton)
      loadMoreButton.classList.toggle(
        "hidden",
        filteredReviews.length <= visibleLimit,
      );
  }
  sourceButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const source = String(this.dataset.reviewSource || "").toLowerCase();
      if (!source) return;
      activeSource = activeSource === source ? "all" : source;
      visibleLimit = 6;
      updateSourceButtons();
      updateReviews();
    });
  });
  if (searchInput)
    searchInput.addEventListener("input", function () {
      visibleLimit = 6;
      updateReviews();
    });
  if (countrySelect)
    countrySelect.addEventListener("change", function () {
      visibleLimit = 6;
      updateReviews();
    });
  if (ratingSelect)
    ratingSelect.addEventListener("change", function () {
      visibleLimit = 6;
      updateReviews();
    });
  if (sortSelect)
    sortSelect.addEventListener("change", function () {
      visibleLimit = 6;
      updateReviews();
    });
  if (loadMoreButton)
    loadMoreButton.addEventListener("click", function () {
      visibleLimit += 3;
      updateReviews();
    });
  ratingFilterButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const rating = this.dataset.ratingFilter || this.dataset.rating || "";
      if (!rating) return;
      if (ratingSelect) ratingSelect.value = rating;
      visibleLimit = 6;
      updateReviews();
      const reviewsGrid = document.getElementById("reviews-grid");
      if (reviewsGrid)
        reviewsGrid.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });
  document.querySelectorAll(".helpful-button").forEach(function (button) {
    button.addEventListener("click", function () {
      this.classList.toggle("text-[var(--region-heading)]");
      const icon = this.querySelector("i");
      if (!icon) return;
      if (this.classList.contains("text-[var(--region-heading)]")) {
        icon.classList.remove("fa-regular");
        icon.classList.add("fa-solid");
      } else {
        icon.classList.remove("fa-solid");
        icon.classList.add("fa-regular");
      }
    });
  });
  const fullReviewModal = document.getElementById("full-review-modal");
  const fullReviewContent = document.getElementById("full-review-content");
  const closeFullReview = document.getElementById("close-full-review");
  function getGoogleIcon() {
    return `<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Google review"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/></svg>`;
  }
  function getTripAdvisorIcon() {
    return `<img src="./assets/img/logo/icon-trip-advisor.webp" alt="TripAdvisor" class="h-5 w-5 object-contain">`;
  }
  function getReviewSourceIcon(source) {
    return source === "google"
      ? getGoogleIcon()
      : source === "tripadvisor"
        ? getTripAdvisorIcon()
        : "";
  }
  function escapeHtml(value) {
    const element = document.createElement("div");
    element.textContent = value == null ? "" : String(value);
    return element.innerHTML;
  }
  function openFullReview(review) {
    if (!fullReviewModal || !fullReviewContent) return;
    const rating = Number(review.rating) || 0;
    let stars = "";
    for (let i = 1; i <= 5; i++)
      stars += `<i class="${i <= rating ? "fa-solid" : "fa-regular"} fa-star text-[#f59e0b]"></i>`;
    const sourceIcon = getReviewSourceIcon(
      String(review.source || "").toLowerCase(),
    );
    let images = "";
    if (Array.isArray(review.images) && review.images.length)
      images = `<div class="mt-6 grid grid-cols-2 gap-3">${review.images.map((image, index) => `<img src="${escapeHtml(image)}" alt="Traveler experience ${index + 1}" class="h-24 w-full rounded-xl object-cover" loading="lazy">`).join("")}</div>`;
    const avatar = review.avatar
      ? `<img src="${escapeHtml(review.avatar)}" alt="${escapeHtml(review.name)}" class="h-14 w-14 rounded-full border-2 border-white object-cover shadow ring-1 ring-slate-200">`
      : `<span class="flex h-14 w-14 items-center justify-center rounded-full bg-[#dceef5] text-lg font-black text-[var(--figma-blue)]">${escapeHtml(
          String(review.name || "?")
            .charAt(0)
            .toUpperCase(),
        )}</span>`;
    fullReviewContent.innerHTML = `<div class="flex items-center gap-3">${avatar}<div class="min-w-0"><div class="flex flex-wrap items-center gap-2"><h3 class="truncate text-xl font-semibold text-[var(--teal-brand)] sm:text-2xl">${escapeHtml(review.name)}</h3>${sourceIcon}</div><p class="mt-1 text-sm font-medium text-black">${escapeHtml(review.country)}<span class="mx-1 text-black">•</span>${escapeHtml(review.date)}</p></div></div><div class="mt-5 flex gap-1 text-sm">${stars}</div><h2 class="mt-5 text-base font-semibold leading-snug text-[var(--text-primary)] sm:text-lg">${escapeHtml(review.title)}</h2><p class="review-text line-clamp-5 text-base leading-6 text-black">${escapeHtml(review.text)}</p>${images}`;
    fullReviewModal.classList.remove("hidden");
    fullReviewModal.classList.add("flex");
    fullReviewModal.setAttribute("aria-hidden", "false");
    document.body.classList.add("overflow-hidden");
  }
  document.querySelectorAll(".show-review-button").forEach(function (button) {
    button.addEventListener("click", function () {
      const rawReview = this.dataset.review;
      if (!rawReview) return;
      try {
        openFullReview(JSON.parse(rawReview));
      } catch (error) {
        console.error("Unable to parse review data.", error);
      }
    });
  });
  function closeFullReviewModal() {
    if (!fullReviewModal) return;
    fullReviewModal.classList.add("hidden");
    fullReviewModal.classList.remove("flex");
    fullReviewModal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("overflow-hidden");
  }
  if (closeFullReview)
    closeFullReview.addEventListener("click", closeFullReviewModal);
  if (fullReviewModal)
    fullReviewModal.addEventListener("click", function (event) {
      if (event.target === fullReviewModal) closeFullReviewModal();
    });
  const reviewModal = document.getElementById("review-modal");
  const reviewModalPanel = document.getElementById("review-modal-panel");
  const openReviewModalButton = document.getElementById("open-review-modal");
  const closeReviewModalButton = document.getElementById("close-review-modal");
  const cancelReviewButton = document.getElementById("cancel-review");
  function openReviewModal() {
    if (!reviewModal) return;
    reviewModal.classList.remove("hidden");
    reviewModal.classList.add("flex");
    document.body.classList.add("overflow-hidden");
  }
  function closeReviewModal() {
    if (!reviewModal) return;
    reviewModal.classList.add("hidden");
    reviewModal.classList.remove("flex");
    document.body.classList.remove("overflow-hidden");
  }
  if (openReviewModalButton)
    openReviewModalButton.addEventListener("click", openReviewModal);
  if (closeReviewModalButton)
    closeReviewModalButton.addEventListener("click", closeReviewModal);
  if (cancelReviewButton)
    cancelReviewButton.addEventListener("click", closeReviewModal);
  if (reviewModal)
    reviewModal.addEventListener("click", function (event) {
      if (event.target === reviewModal) closeReviewModal();
    });
  const ratingStars = document.querySelectorAll(".rating-star");
  const ratingValue = document.getElementById("review-rating-value");
  const ratingError = document.getElementById("rating-error");
  ratingStars.forEach(function (star) {
    star.addEventListener("click", function () {
      const value = Number(this.dataset.value);
      if (ratingValue) ratingValue.value = value;
      if (ratingError) ratingError.classList.add("hidden");
      ratingStars.forEach(function (item) {
        const itemValue = Number(item.dataset.value);
        if (itemValue <= value) {
          item.classList.remove("text-slate-300");
          item.classList.add(
            "border-[#f59e0b]",
            "bg-[#fff8e7]",
            "text-[#f59e0b]",
          );
        } else {
          item.classList.remove(
            "border-[#f59e0b]",
            "bg-[#fff8e7]",
            "text-[#f59e0b]",
          );
          item.classList.add("text-slate-300");
        }
      });
    });
  });
  const messageInput = document.getElementById("review-message");
  const characterCount = document.getElementById("review-character-count");
  if (messageInput && characterCount)
    messageInput.addEventListener("input", function () {
      characterCount.textContent = this.value.length;
    });
  const reviewForm = document.getElementById("review-form");
  if (reviewForm)
    reviewForm.addEventListener("submit", function (event) {
      event.preventDefault();
      if (ratingValue && Number(ratingValue.value) === 0) {
        if (ratingError) ratingError.classList.remove("hidden");
        return;
      }
      const submitButton = this.querySelector('button[type="submit"]');
      if (!submitButton) return;
      submitButton.disabled = true;
      submitButton.innerHTML = `<i class="fa-solid fa-spinner fa-spin mr-2"></i>Submitting...`;
      setTimeout(function () {
        submitButton.disabled = false;
        submitButton.innerHTML = "Submit Review";
        alert("Thank you! Your review has been submitted for approval.");
        reviewForm.reset();
        if (ratingValue) ratingValue.value = 0;
        ratingStars.forEach(function (star) {
          star.classList.remove(
            "border-[#f59e0b]",
            "bg-[#fff8e7]",
            "text-[#f59e0b]",
          );
          star.classList.add("text-slate-300");
        });
        closeReviewModal();
      }, 1000);
    });
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      closeReviewModal();
      closeFullReviewModal();
    }
  });
  updateSourceButtons();
  updateReviews();
});

// Related equipment JS
document.addEventListener("DOMContentLoaded", function () {
  const relatedFaqSearchInput = document.getElementById("relatedFaqSearch");
  const relatedFaqSortSelect = document.getElementById("relatedFaqSort");
  const relatedFaqGrid = document.getElementById("relatedFaqGrid");
  const relatedFaqResults = document.getElementById("relatedFaqResults");
  const relatedFaqEmpty = document.getElementById("relatedFaqEmpty");
  const relatedFaqClear = document.getElementById("relatedFaqClear");
  const relatedFaqViewMore = document.getElementById("relatedFaqViewMore");
  const relatedFaqViewMoreWrapper = document.getElementById(
    "relatedFaqViewMoreWrapper",
  );
  if (
    !relatedFaqSearchInput ||
    !relatedFaqSortSelect ||
    !relatedFaqGrid ||
    !relatedFaqResults ||
    !relatedFaqEmpty ||
    !relatedFaqClear ||
    !relatedFaqViewMore ||
    !relatedFaqViewMoreWrapper
  ) {
    return;
  }
  const relatedFaqCards = Array.from(
    relatedFaqGrid.querySelectorAll(".related-faq-card"),
  );
  const relatedFaqItemsPerLoad = 3;
  let relatedFaqVisibleCount = relatedFaqItemsPerLoad;

  function relatedFaqGetDate(card) {
    const dateValue = card.dataset.date || "";
    if (!dateValue) {
      return 0;
    }
    const timestamp = new Date(dateValue).getTime();
    return Number.isNaN(timestamp) ? 0 : timestamp;
  }

  function relatedFaqSortCards(cards, sortValue) {
    const sortedCards = [...cards];
    sortedCards.sort(function (firstCard, secondCard) {
      if (sortValue === "oldest") {
        return relatedFaqGetDate(firstCard) - relatedFaqGetDate(secondCard);
      }
      if (sortValue === "title_asc") {
        return (firstCard.dataset.title || "").localeCompare(
          secondCard.dataset.title || "",
        );
      }
      if (sortValue === "title_desc") {
        return (secondCard.dataset.title || "").localeCompare(
          firstCard.dataset.title || "",
        );
      }
      return relatedFaqGetDate(secondCard) - relatedFaqGetDate(firstCard);
    });
    return sortedCards;
  }

  function relatedFaqRender() {
    const searchValue = relatedFaqSearchInput.value.trim().toLowerCase();
    const sortValue = relatedFaqSortSelect.value;
    let filteredCards = relatedFaqCards.filter(function (card) {
      if (!searchValue) {
        return true;
      }
      const searchableText = card.dataset.search || "";
      return searchableText.includes(searchValue);
    });
    filteredCards = relatedFaqSortCards(filteredCards, sortValue);
    relatedFaqGrid.innerHTML = "";
    const cardsToShow = filteredCards.slice(0, relatedFaqVisibleCount);
    cardsToShow.forEach(function (card) {
      card.classList.remove("hidden");
      relatedFaqGrid.appendChild(card);
    });
    if (filteredCards.length === 0) {
      relatedFaqResults.textContent = "No results found";
    } else {
      relatedFaqResults.textContent =
        "Showing " +
        cardsToShow.length +
        " of " +
        filteredCards.length +
        " results";
    }
    if (filteredCards.length === 0) {
      relatedFaqEmpty.classList.remove("hidden");
    } else {
      relatedFaqEmpty.classList.add("hidden");
    }
    if (filteredCards.length > relatedFaqVisibleCount) {
      relatedFaqViewMoreWrapper.classList.remove("hidden");
    } else {
      relatedFaqViewMoreWrapper.classList.add("hidden");
    }
  }
  relatedFaqSearchInput.addEventListener("input", function () {
    relatedFaqVisibleCount = relatedFaqItemsPerLoad;
    relatedFaqRender();
  });
  relatedFaqSortSelect.addEventListener("change", function () {
    relatedFaqVisibleCount = relatedFaqItemsPerLoad;
    relatedFaqRender();
  });
  relatedFaqViewMore.addEventListener("click", function () {
    relatedFaqVisibleCount += relatedFaqItemsPerLoad;
    relatedFaqRender();
  });
  relatedFaqClear.addEventListener("click", function () {
    relatedFaqSearchInput.value = "";
    relatedFaqSortSelect.value = "latest";
    relatedFaqVisibleCount = relatedFaqItemsPerLoad;
    relatedFaqSearchInput.focus();
    relatedFaqRender();
  });
  relatedFaqRender();
});
document.addEventListener("DOMContentLoaded", function () {
  const galleryCards = document.querySelectorAll(".gallery-card");
  const modal = document.getElementById("tripPhotoModal");
  const modalImage = document.getElementById("tripPhotoModalImage");
  const modalTitle = document.getElementById("tripPhotoModalTitle");
  const closeButton = document.getElementById("tripPhotoModalClose");
  const prevButton = document.getElementById("tripPhotoModalPrev");
  const nextButton = document.getElementById("tripPhotoModalNext");
  let currentGalleryIndex = 0;
  let lastFocusedElement = null;
  const photos = Array.from(galleryCards).map((card) => ({
    image: card.dataset.image,
    title: card.dataset.title || "",
  }));
  function openGalleryModal(index) {
    if (!photos.length) {
      return;
    }
    currentGalleryIndex = index;
    const photo = photos[currentGalleryIndex];
    modalImage.src = photo.image;
    modalImage.alt = photo.title;
    modalTitle.textContent = photo.title;
    modal.classList.remove("hidden");
    modal.classList.add("flex");
    modal.setAttribute("aria-hidden", "false");
    document.body.classList.add("overflow-hidden");
    closeButton.focus();
    updateGalleryNavigation();
  }
  function closeGalleryModal() {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
    modal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("overflow-hidden");
    modalImage.src = "";
    if (lastFocusedElement) {
      lastFocusedElement.focus();
      lastFocusedElement = null;
    }
  }
  function showPreviousGalleryPhoto() {
    if (!photos.length) {
      return;
    }
    currentGalleryIndex =
      (currentGalleryIndex - 1 + photos.length) % photos.length;
    updateGalleryPhoto();
  }
  function showNextGalleryPhoto() {
    if (!photos.length) {
      return;
    }
    currentGalleryIndex = (currentGalleryIndex + 1) % photos.length;
    updateGalleryPhoto();
  }
  function updateGalleryPhoto() {
    const photo = photos[currentGalleryIndex];
    modalImage.src = photo.image;
    modalImage.alt = photo.title;
    modalTitle.textContent = photo.title;
    updateGalleryNavigation();
  }
  function updateGalleryNavigation() {
    if (photos.length <= 1) {
      prevButton.classList.add("hidden");
      nextButton.classList.add("hidden");
    } else {
      prevButton.classList.remove("hidden");
      nextButton.classList.remove("hidden");
    }
  }
  galleryCards.forEach((card, index) => {
    card.addEventListener("click", function () {
      lastFocusedElement = this;
      openGalleryModal(index);
    });
  });
  if (modal && closeButton && prevButton && nextButton) {
    closeButton.addEventListener("click", closeGalleryModal);
    prevButton.addEventListener("click", showPreviousGalleryPhoto);
    nextButton.addEventListener("click", showNextGalleryPhoto);
    modal.addEventListener("click", function (event) {
      if (event.target === modal) {
        closeGalleryModal();
      }
    });
  }
  const lightbox = document.getElementById("documentLightbox");
  const lightboxImage = document.getElementById("documentLightboxImage");
  const lightboxTitle = document.getElementById("documentLightboxTitle");
  const lightboxDescription = document.getElementById(
    "documentLightboxDescription",
  );
  const documentCloseButton = document.getElementById("documentLightboxClose");
  const documentPrevButton = document.getElementById("documentLightboxPrev");
  const documentNextButton = document.getElementById("documentLightboxNext");
  const triggers = Array.from(
    document.querySelectorAll(".document-lightbox-trigger"),
  );
  let currentDocumentIndex = 0;
  function openDocumentLightbox(index) {
    const trigger = triggers[index];
    if (!trigger) {
      return;
    }
    currentDocumentIndex = index;
    const image = trigger.dataset.image;
    const title = trigger.dataset.title || "DOCUMENT";
    const description = trigger.dataset.description || "";
    lightboxImage.src = image;
    lightboxImage.alt = title;
    lightboxTitle.textContent = title;
    lightboxDescription.textContent = description;
    lightbox.classList.remove("hidden");
    lightbox.classList.add("flex");
    lightbox.setAttribute("aria-hidden", "false");
    document.body.classList.add("overflow-hidden");
  }
  function closeDocumentLightbox() {
    lightbox.classList.add("hidden");
    lightbox.classList.remove("flex");
    lightbox.setAttribute("aria-hidden", "true");
    lightboxImage.src = "";
    document.body.classList.remove("overflow-hidden");
  }
  function showPreviousDocument() {
    if (triggers.length === 0) {
      return;
    }
    currentDocumentIndex =
      (currentDocumentIndex - 1 + triggers.length) % triggers.length;
    openDocumentLightbox(currentDocumentIndex);
  }
  function showNextDocument() {
    if (triggers.length === 0) {
      return;
    }
    currentDocumentIndex = (currentDocumentIndex + 1) % triggers.length;
    openDocumentLightbox(currentDocumentIndex);
  }
  triggers.forEach(function (trigger, index) {
    trigger.addEventListener("click", function (event) {
      event.preventDefault();
      openDocumentLightbox(index);
    });
  });
  if (
    lightbox &&
    lightboxImage &&
    documentCloseButton &&
    documentPrevButton &&
    documentNextButton
  ) {
    documentCloseButton.addEventListener("click", closeDocumentLightbox);
    documentPrevButton.addEventListener("click", showPreviousDocument);
    documentNextButton.addEventListener("click", showNextDocument);
    lightbox.addEventListener("click", function (event) {
      if (event.target === lightbox) {
        closeDocumentLightbox();
      }
    });
  }
  document.addEventListener("keydown", function (event) {
    const galleryOpen = modal && !modal.classList.contains("hidden");
    const documentLightboxOpen =
      lightbox && !lightbox.classList.contains("hidden");
    if (galleryOpen) {
      if (event.key === "Escape") {
        closeGalleryModal();
      } else if (event.key === "ArrowLeft") {
        showPreviousGalleryPhoto();
      } else if (event.key === "ArrowRight") {
        showNextGalleryPhoto();
      }
      return;
    }
    if (documentLightboxOpen) {
      if (event.key === "Escape") {
        closeDocumentLightbox();
      } else if (event.key === "ArrowLeft") {
        showPreviousDocument();
      } else if (event.key === "ArrowRight") {
        showNextDocument();
      }
    }
  });
});
function initializeToc(pageSelector, linkSelector, sectionSelector) {
  const page = document.querySelector(pageSelector);

  if (!page) {
    return;
  }

  const tocLinks = page.querySelectorAll(linkSelector);
  const sections = page.querySelectorAll(sectionSelector);

  if (!tocLinks.length || !sections.length) {
    return;
  }

  function setActiveLink(id) {
    tocLinks.forEach(function (link) {
      const targetId = link.getAttribute("href").substring(1);

      const isActive =
        targetId === id ||
        (targetId === "section-5" &&
          [
            "section-5",
            "section-6",
            "section-7",
            "section-8",
            "section-9",
            "section-10",
          ].includes(id)) ||
        (targetId === "section-11" &&
          ["section-11", "section-12", "section-13", "section-14"].includes(
            id,
          )) ||
        (targetId === "section-15" &&
          ["section-15", "section-16", "section-17", "section-18"].includes(
            id,
          ));

      link.classList.toggle("active", isActive);
      link.classList.toggle("bg-[var(--teal-brand)]", isActive);
      link.classList.toggle("text-[var(--white)]", isActive);
      link.classList.toggle("text-white", isActive);

      const icon = link.querySelector(".fa-caret-right");

      if (icon) {
        icon.classList.toggle("text-[var(--white)]", isActive);
        icon.classList.toggle("text-white", isActive);
        if (icon.parentElement) {
          icon.parentElement.classList.toggle("text-white", isActive);
        }
      }

      const chevron = link.querySelector(".fa-chevron-right");
      if (chevron) {
        chevron.classList.toggle("text-[var(--white)]", isActive);
        chevron.classList.toggle("text-white", isActive);
      }
    });
  }

  // Initial active link based on URL hash or first section
  const hash = window.location.hash ? window.location.hash.substring(1) : "";
  if (hash && page.querySelector(`#${hash}`)) {
    setActiveLink(hash);
  } else if (sections.length > 0) {
    setActiveLink(sections[0].id);
  }

  // Smooth scroll click handler
  tocLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      const href = this.getAttribute("href");

      if (!href || !href.startsWith("#")) {
        return;
      }

      const target = page.querySelector(href);

      if (!target) {
        return;
      }

      event.preventDefault();

      const offset = 100;

      const targetPosition =
        target.getBoundingClientRect().top + window.scrollY - offset;

      window.scrollTo({
        top: targetPosition,
        behavior: "smooth",
      });

      setActiveLink(target.id);
    });
  });

  // Dynamic scroll position tracker for reliable active highlighting
  const updateActiveSectionOnScroll = function () {
    const scrollPos = window.scrollY + 140;
    let currentId = "";
    sections.forEach(function (section) {
      const top = section.getBoundingClientRect().top + window.scrollY;
      if (top <= scrollPos) {
        currentId = section.id;
      }
    });
    if (currentId) {
      setActiveLink(currentId);
    }
  };

  window.addEventListener("scroll", updateActiveSectionOnScroll, {
    passive: true,
  });

  // IntersectionObserver for view boundary detection
  const tocObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) {
          return;
        }

        setActiveLink(entry.target.id);
      });
    },
    {
      rootMargin: "-100px 0px -55% 0px",
    },
  );

  sections.forEach(function (section) {
    tocObserver.observe(section);
  });
}

document.addEventListener("DOMContentLoaded", function () {
  initializeToc(
    ".satori-message-page",
    ".message-toc-link",
    "article section[id]",
  );
  initializeToc(".satori-terms-page", ".terms-toc-link", ".terms-section");
  initializeToc(
    ".satori-equipment-page",
    ".equipment-toc-link",
    "article section[id]",
  );
});

//Blog search and sorting js
/* RELATED BLOGS - SEARCH & SORT */
(function () {
  function initRelatedBlogs() {
    const containers = document.querySelectorAll(
      "[data-related-blogs-container]",
    );

    if (!containers.length) {
      return;
    }

    containers.forEach(function (container) {
      const searchInput = container.querySelector("#blog-search");
      const sortSelect = container.querySelector("#related-blogs");

      if (!searchInput || !sortSelect) {
        return;
      }

      function getBlogArticles() {
        return Array.from(container.querySelectorAll(":scope > article"));
      }

      function getBlogTitle(article) {
        const title = article.querySelector("h3");
        return title ? title.textContent.trim() : "";
      }

      function getBlogDate(article) {
        const time = article.querySelector("time");
        return time ? time.getAttribute("datetime") || "" : "";
      }

      function getBlogSearchText(article) {
        return article.textContent.trim().toLowerCase();
      }

      function getNoResultElement() {
        let noResult = container.querySelector("[data-blog-no-result]");

        if (!noResult) {
          noResult = document.createElement("div");
          noResult.setAttribute("data-blog-no-result", "");
          noResult.className =
            "hidden py-8 text-center text-base font-semibold text-[var(--text-primary)]";
          noResult.textContent = "No blogs found.";
          container.appendChild(noResult);
        }

        return noResult;
      }

      function filterBlogs() {
        const searchValue = searchInput.value.trim().toLowerCase();
        const articles = getBlogArticles();
        let visibleCount = 0;

        articles.forEach(function (article) {
          const searchText = getBlogSearchText(article);
          const matches = !searchValue || searchText.includes(searchValue);

          article.classList.toggle("hidden", !matches);

          if (matches) {
            visibleCount++;
          }
        });

        const noResult = getNoResultElement();

        noResult.classList.toggle("hidden", visibleCount !== 0);
      }

      function sortBlogs() {
        const articles = getBlogArticles();
        const sortValue = sortSelect.value;

        if (!articles.length) {
          return;
        }

        articles.sort(function (firstArticle, secondArticle) {
          const firstDate = getBlogDate(firstArticle);
          const secondDate = getBlogDate(secondArticle);
          const firstTitle = getBlogTitle(firstArticle).toLowerCase();
          const secondTitle = getBlogTitle(secondArticle).toLowerCase();

          switch (sortValue) {
            case "newest":
              return secondDate.localeCompare(firstDate);

            case "oldest":
              return firstDate.localeCompare(secondDate);

            case "az":
              return firstTitle.localeCompare(secondTitle);

            default:
              return 0;
          }
        });

        articles.forEach(function (article) {
          container.appendChild(article);
        });

        filterBlogs();
      }

      searchInput.addEventListener("input", function () {
        filterBlogs();
      });

      sortSelect.addEventListener("change", function () {
        sortBlogs();
      });

      const searchForm = searchInput.closest("form");

      if (searchForm) {
        searchForm.addEventListener("submit", function (event) {
          event.preventDefault();
          filterBlogs();
        });
      }

      filterBlogs();
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initRelatedBlogs);
  } else {
    initRelatedBlogs();
  }
})();
