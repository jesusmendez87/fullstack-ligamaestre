import { HttpInterceptorFn } from '@angular/common/http';
export const authInterceptor: HttpInterceptorFn = (req, next) => {

  const token = localStorage.getItem('token');

  console.log('TOKEN:', token); // 👈 DEBUG IMPORTANTE

  if (!token) return next(req);

  const cloned = req.clone({
    setHeaders: {
      Authorization: `Bearer ${token}`,
        'Accept': 'application/json' // <--- AÑADE ESTO
    }
  });

  return next(cloned);
};
