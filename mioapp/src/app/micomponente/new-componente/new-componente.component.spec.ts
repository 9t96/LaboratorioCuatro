import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewComponenteComponent } from './new-componente.component';

describe('NewComponenteComponent', () => {
  let component: NewComponenteComponent;
  let fixture: ComponentFixture<NewComponenteComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewComponenteComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewComponenteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
