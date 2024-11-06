(function () {

  const config = window.kntntInstantPages
  const hasSpeculationSupport = HTMLScriptElement.supports && HTMLScriptElement.supports('speculationrules')

  // Only load instant.page if Speculation Rules is NOT supported or plugin is NOT active
  if (!(config.speculationActive && hasSpeculationSupport)) {
    const script = document.createElement('script')
    script.type = 'module'
    script.src = config.instantPageUrl
    document.head.appendChild(script)
  }

})()