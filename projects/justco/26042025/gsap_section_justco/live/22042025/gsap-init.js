function afterPageLoad() {
  let siteHeader = document.querySelector(".main-header-tm");
  let headerHeight = siteHeader.offsetHeight;

  gsap.registerPlugin(ScrollTrigger);

  let slideRowDiv = document.querySelector(".boring_concept .slide_row");
  console.log(slideRowDiv.offsetWidth);
  let totalSlideWidth = 0;
  document
    .querySelectorAll(".boring_concept .slide_row .slide")
    .forEach((slide) => {
      totalSlideWidth += slide.offsetWidth;
    });

  ScrollTrigger.matchMedia({
    // Desktop only
    "(min-width: 992px)": function () {
      gsap.to(".boring_concept .slide_row", {
        x: -slideRowDiv.offsetWidth,
        ease: "linear",
        scrollTrigger: {
          trigger: ".boring_concept",
          pin: ".boring_concept",
          pinSpacing: true,
          scrub: 1,
          // start: "top top",
          start: `top ${headerHeight}`,
          end: () => "+=" + totalSlideWidth,
        },
      });

      gsap.to(".boring_concept .slide.special", {
        x: -totalSlideWidth * 0.085,
        ease: "linear",
        scrollTrigger: {
          trigger: ".boring_concept",
          scrub: 1,
          start: "top top",
          end: () => "+=" + totalSlideWidth,
        },
      });
    },

    // Mobile — kill or do nothing
    "(max-width: 992px)": function () {
      // Optionally reset position
      gsap.set(".boring_concept .slide_row", { clearProps: "all" });
      gsap.set(".boring_concept .slide.special", { clearProps: "all" });
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
          markers: false,
          start: "top 90%",
          end: "bottom 0%",
        },
      });
      t2.from(".boring_process .left", {
        duration: 1,
        opacity: 0,
      });
      t2.from(
        ".boring_process .hdng_58 span",
        {
          y: 50,
          opacity: 0,
          stagger: 0.05,
          ease: "ease-in-out",
        },
        "SyncOn"
      );
      t2.from(
        ".boring_process p",
        {
          y: 50,
          opacity: 0,
          ease: "ease-in-out",
        },
        "SyncOnTwo"
      );
      t2.from(".boring_process .tbo_btn", {
        y: 50,
        opacity: 0,
        ease: "ease-in-out",
      });
      t2.from(
        ".boring_process .list_wrap li",
        {
          y: 50,
          opacity: 0,
          stagger: 0.25,
          ease: "ease-in-out",
        },
        "SyncOn"
      );
      t2.from(
        ".boring_process .btn_wrap",
        {
          y: 50,
          opacity: 0,
          ease: "ease",
        },
        "SyncOnTwo"
      );
    },
  });

  // for boring addons  section
  let addonHeadings = document.querySelectorAll(".boring_addons .hdng_58 div");
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
        },
      });
      t3.from(".boring_addons .left", {
        duration: 1,
        opacity: 0,
      });
      t3.from(
        ".boring_addons .hdng_58 span",
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
          end: "+=10000", // or some larger value that suits the full animation span
        },
      });
      t4.fromTo(
        boxOne,
        { y: 100, opacity: 0 },
        { y: 0, opacity: 1, duration: 0.15, ease: "power3.out", delay: 0 },
        "SameSync"
      );
      t4.fromTo(
        boxTwo,
        { y: 150, opacity: 0 },
        { y: 50, opacity: 1, duration: 0.15, ease: "power3.out", delay: 0.1 },

        "SameSync"
      );
      t4.fromTo(
        boxThree,
        { y: 200, opacity: 0 },
        { y: 100, opacity: 1, duration: 0.15, ease: "power3.out", delay: 0.2 },
        "SameSync"
      );
    },
  });
}
window.addEventListener("load", afterPageLoad);
