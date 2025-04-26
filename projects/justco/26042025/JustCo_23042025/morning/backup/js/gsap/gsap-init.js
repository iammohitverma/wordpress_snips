function afterPageLoad() {
  let siteHeader = document.querySelector(".main-header-tm");
  let headerHeight = siteHeader.offsetHeight;

  gsap.registerPlugin(ScrollTrigger);

  let slideRowDiv = document.querySelector(".boring_concept .slide_row");

  // for boring concept section
  ScrollTrigger.matchMedia({
    // Desktop only
    "(min-width: 992px)": function () {
      gsap.to(".boring_concept .slide_row", {
        x: () => (slideRowDiv.scrollWidth - window.innerWidth) * -1,
        ease: "linear",
        scrollTrigger: {
          trigger: ".boring_concept",
          pin: ".boring_concept",
          pinSpacing: true,
          scrub: 1,
          start: `top ${headerHeight}`,
          end: "+=3000px",
        },
      });
    },

    // Mobile — kill or do nothing
    "(max-width: 992px)": function () {
      // Optionally reset position
      gsap.set(".boring_concept .slide_row", { clearProps: "all" });
    },
  });

  // for boring process section
  let boringHeadings = document.querySelectorAll(
    ".boring_process .hdng_58 div"
  );

  boringHeadings.forEach((heading) => {
    let text = heading.textContent;
    let newHTML = "";

    text.split("").forEach((char) => {
      if (char === " ") {
        newHTML += " ";
      } else {
        newHTML += `<span>${char}</span>`;
      }
    });

    heading.innerHTML = newHTML;
  });

  ScrollTrigger.matchMedia({
    // Desktop only
    "(min-width: 992px)": function () {
      var t2 = gsap.timeline({
        scrollTrigger: {
          trigger: ".boring_process",
          scroller: "body",
          start: "top 100%",
          end: "bottom 70%",
          scrub: 1,
        },
      });

      t2.from(".boring_process .left", {
        opacity: 0,
        y: 30,
        duration: 1,
        ease: "power2.out",
      })
        .from(
          ".boring_process .hdng_58 span",
          {
            y: 50,
            opacity: 0,
            stagger: 0.05,
            ease: "power2.out",
          },
          "-=0.8"
        )
        .from(
          ".boring_process p",
          {
            y: 40,
            opacity: 0,
            ease: "power2.out",
          },
          "-=0.6"
        )
        .from(
          ".boring_process .tbo_btn",
          {
            y: 30,
            opacity: 0,
            ease: "power2.out",
          },
          "-=0.5"
        )
        .from(
          ".boring_process .list_wrap li",
          {
            y: 40,
            opacity: 0,
            stagger: 0.2,
            ease: "power2.out",
          },
          "-=1"
        )
        .from(
          ".boring_process .btn_wrap",
          {
            y: 30,
            opacity: 0,
            ease: "power2.out",
          },
          "-=0.6"
        );
    },
  });

  // for boring addons  section
  let addonHeadings = document.querySelectorAll(".boring_addons .hdng_52 div");
  let boxOne = document.querySelector(".boring_addons [ data-box='1']");
  let boxTwo = document.querySelector(".boring_addons [ data-box='2']");
  let boxThree = document.querySelector(".boring_addons [ data-box='3']");

  addonHeadings.forEach((heading) => {
    let text = heading.textContent;
    let newHTML = "";

    text.split("").forEach((char) => {
      if (char === " ") {
        newHTML += " ";
      } else {
        newHTML += `<span>${char}</span>`;
      }
    });

    heading.innerHTML = newHTML;
  });

  ScrollTrigger.matchMedia({
    // Desktop only
    "(min-width: 992px)": function () {
      var t3 = gsap.timeline({
        scrollTrigger: {
          trigger: ".boring_addons",
          scroller: "body",
          markers: false,
          start: "top 80%",
          end: "bottom 0%",
          scrub: 1,
        },
      });
      t3.from(".boring_addons .left", {
        duration: 1,
        opacity: 0,
      });
      t3.from(
        ".boring_addons .hdng_52 span",
        {
          y: 50,
          opacity: 0,
          stagger: 0.05,
          ease: "ease-in-out",
        },
        "SyncOn"
      );
      t3.from(
        ".boring_addons .right p",
        {
          y: 50,
          opacity: 0,
          ease: "ease-in-out",
        },
        "SyncOnTwo"
      );
      var t4 = gsap.timeline({
        scrollTrigger: {
          trigger: ".boring_addons",
          pin: ".boring_addons",
          pinSpacing: true,
          scrub: 1,
          start: "top 10%",
          end: "+=1000", // or some larger value that suits the full animation span
        },
      });
      t4.fromTo(
        boxOne,
        { x: 60, y: 120, opacity: 0 },
        {
          x: 0,
          y: 0,
          opacity: 1,
          duration: 0.0025,
          ease: "power3.out",
          delay: 0,
        },
        "SameSync"
      );
      t4.fromTo(
        boxTwo,
        { x: 260, y: 140, opacity: 0 },
        {
          x: 200,
          y: 50,
          opacity: 1,
          duration: 0.0025,
          ease: "power3.out",
          delay: 0.0025,
        },

        "SameSync"
      );
      t4.fromTo(
        boxThree,
        { x: 460, y: 160, opacity: 0 },
        {
          x: 400,
          y: 100,
          opacity: 1,
          duration: 0.0025,
          ease: "power3.out",
          delay: 0.005,
        },
        "SameSync"
      );
    },
  });
}
window.addEventListener("load", afterPageLoad);
