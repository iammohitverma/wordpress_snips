// IDs of CSS files to disable or remove
const cssIds = ["justco-theme-style-old-css", "justco-theme-style-css"];

// IDs of JS files to remove
const jsIds = ["your-script"];

// Disable or remove CSS stylesheets
cssIds.forEach((id) => {
  const styleEl = document.getElementById(id);
  if (styleEl) {
    styleEl.disabled = true;
    // Or
    // styleEl.remove();
  }
});

// Remove JS script tags
jsIds.forEach((id) => {
  const scriptEl = document.getElementById(id);
  if (scriptEl) {
    scriptEl.remove();
  }
});
