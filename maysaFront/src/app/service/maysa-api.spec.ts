import { TestBed } from '@angular/core/testing';

import { MaysaApi } from './maysa-api';

describe('MaysaApi', () => {
  let service: MaysaApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(MaysaApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
