const validatePlate = (dniplate) => {
    return /^[A-Z]{3}-\d{3}$/.test(dniplate.trim());
  }
  