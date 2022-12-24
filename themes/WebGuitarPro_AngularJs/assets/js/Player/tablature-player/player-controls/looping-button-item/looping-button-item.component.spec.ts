import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LoopingButtonItemComponent } from './looping-button-item.component';

describe('LoopingButtonItemComponent', () => {
  let component: LoopingButtonItemComponent;
  let fixture: ComponentFixture<LoopingButtonItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ LoopingButtonItemComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(LoopingButtonItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
