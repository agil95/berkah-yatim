export const getNominalZakatProfesi = ({ salary = 0, otherIncome = 0, debt = 0 }) => {
  return fetch('https://sekawan.ktbs.xyz/v1/auth/zakat/calculator/profession', {
    method: 'POST',
    body: JSON.stringify({
      monthly_income: salary,
			other_income: otherIncome,
			debt,
    }),
    headers: {
      'X-Client-Key': 'ngo-whitelabe-zakat',
      'X-Client-Secret': 'YQ94Me2jN9QG6HxF',
    },
  });
};
