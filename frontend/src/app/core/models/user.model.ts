export interface IUser {
  id: string;
  username: string;
  password: string;
  name: string;
 rol: string;
}

export class IUser implements IUser {
  constructor(
    public id: string,
    public name: string,
    public rol: string,

  ) {}
}
